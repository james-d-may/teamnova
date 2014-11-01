'use strict';

/**
 * Module dependencies.
 */
var mongoose = require('mongoose'),
	errorHandler = require('./errors.server.controller'),
	Phonemenu = mongoose.model('Phonemenu'),
	_ = require('lodash');

/**
 * Create a Phonemenu
 */
exports.create = function(req, res) {
	var phonemenu = new Phonemenu(req.body);
	phonemenu.user = req.user;

	phonemenu.save(function(err) {
		if (err) {
			return res.status(400).send({
				message: errorHandler.getErrorMessage(err)
			});
		} else {
			res.jsonp(phonemenu);
		}
	});
};

/**
 * Show the current Phonemenu
 */
exports.read = function(req, res) {
	res.jsonp(req.phonemenu);
};

/**
 * Update a Phonemenu
 */
exports.update = function(req, res) {
	var phonemenu = req.phonemenu ;

	phonemenu = _.extend(phonemenu , req.body);

	phonemenu.save(function(err) {
		if (err) {
			return res.status(400).send({
				message: errorHandler.getErrorMessage(err)
			});
		} else {
			res.jsonp(phonemenu);
		}
	});
};

/**
 * Delete an Phonemenu
 */
exports.delete = function(req, res) {
	var phonemenu = req.phonemenu ;

	phonemenu.remove(function(err) {
		if (err) {
			return res.status(400).send({
				message: errorHandler.getErrorMessage(err)
			});
		} else {
			res.jsonp(phonemenu);
		}
	});
};

/**
 * List of Phonemenus
 */
exports.list = function(req, res) { Phonemenu.find().sort('-created').populate('user', 'displayName').exec(function(err, phonemenus) {
		if (err) {
			return res.status(400).send({
				message: errorHandler.getErrorMessage(err)
			});
		} else {
			res.jsonp(phonemenus);
		}
	});
};

/**
 * Phonemenu middleware
 */
exports.phonemenuByID = function(req, res, next, id) { Phonemenu.findById(id).populate('user', 'displayName').exec(function(err, phonemenu) {
		if (err) return next(err);
		if (! phonemenu) return next(new Error('Failed to load Phonemenu ' + id));
		req.phonemenu = phonemenu ;
		next();
	});
};

/**
 * Phonemenu authorization middleware
 */
exports.hasAuthorization = function(req, res, next) {
	if (req.phonemenu.user.id !== req.user.id) {
		return res.status(403).send('User is not authorized');
	}
	next();
};