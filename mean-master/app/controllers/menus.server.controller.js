'use strict';

/**
 * Module dependencies.
 */
var mongoose = require('mongoose'),
	Menu = mongoose.model('Menu'),
	_ = require('lodash');

/**
 * Get the error message from error object
 */
var getErrorMessage = function(err) {
	var message = '';

	if (err.code) {
		switch (err.code) {
			case 11000:
			case 11001:
				message = 'Menu already exists';
				break;
			default:
				message = 'Something went wrong';
		}
	} else {
		for (var errName in err.errors) {
			if (err.errors[errName].message) message = err.errors[errName].message;
		}
	}

	return message;
};

/**
 * Create a Menu
 */
exports.create = function(req, res) {
	var menu = new Menu(req.body);
	menu.user = req.user;

	menu.save(function(err) {
		if (err) {
			return res.send(400, {
				message: getErrorMessage(err)
			});
		} else {
			res.jsonp(menu);
		}
	});
};

/**
 * Show the current Menu
 */
exports.read = function(req, res) {
	res.jsonp(req.menu);
};

/**
 * Update a Menu
 */
exports.update = function(req, res) {
	var menu = req.menu ;

	menu = _.extend(menu , req.body);

	menu.save(function(err) {
		if (err) {
			return res.send(400, {
				message: getErrorMessage(err)
			});
		} else {
			res.jsonp(menu);
		}
	});
};

/**
 * Delete an Menu
 */
exports.delete = function(req, res) {
	var menu = req.menu ;

	menu.remove(function(err) {
		if (err) {
			return res.send(400, {
				message: getErrorMessage(err)
			});
		} else {
			res.jsonp(menu);
		}
	});
};

/**
 * List of Menus
 */
exports.list = function(req, res) { Menu.find().sort('-created').populate('user', 'displayName').exec(function(err, menus) {
		if (err) {
			return res.send(400, {
				message: getErrorMessage(err)
			});
		} else {
			res.jsonp(menus);
		}
	});
};

/**
 * Menu middleware
 */
exports.menuByID = function(req, res, next, id) { Menu.findById(id).populate('user', 'displayName').exec(function(err, menu) {
		if (err) return next(err);
		if (! menu) return next(new Error('Failed to load Menu ' + id));
		req.menu = menu ;
		next();
	});
};

/**
 * Menu authorization middleware
 */
exports.hasAuthorization = function(req, res, next) {
	if (req.menu.user.id !== req.user.id) {
		return res.send(403, 'User is not authorized');
	}
	next();
};