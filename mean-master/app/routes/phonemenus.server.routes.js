'use strict';

module.exports = function(app) {
	var users = require('../../app/controllers/users.server.controller');
	var phonemenus = require('../../app/controllers/phonemenus.server.controller');

	// Phonemenus Routes
	app.route('/phonemenus')
		.get(phonemenus.list)
		.post(users.requiresLogin, phonemenus.create);

	app.route('/phonemenus/:phonemenuId')
		.get(phonemenus.read)
		.put(users.requiresLogin, phonemenus.hasAuthorization, phonemenus.update)
		.delete(users.requiresLogin, phonemenus.hasAuthorization, phonemenus.delete);

	// Finish by binding the Phonemenu middleware
	app.param('phonemenuId', phonemenus.phonemenuByID);
};