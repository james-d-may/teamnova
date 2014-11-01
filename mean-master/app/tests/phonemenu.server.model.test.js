'use strict';

/**
 * Module dependencies.
 */
var should = require('should'),
	mongoose = require('mongoose'),
	User = mongoose.model('User'),
	Phonemenu = mongoose.model('Phonemenu');

/**
 * Globals
 */
var user, phonemenu;

/**
 * Unit tests
 */
describe('Phonemenu Model Unit Tests:', function() {
	beforeEach(function(done) {
		user = new User({
			firstName: 'Full',
			lastName: 'Name',
			displayName: 'Full Name',
			email: 'test@test.com',
			username: 'username',
			password: 'password'
		});

		user.save(function() { 
			phonemenu = new Phonemenu({
				name: 'Phonemenu Name',
				user: user
			});

			done();
		});
	});

	describe('Method Save', function() {
		it('should be able to save without problems', function(done) {
			return phonemenu.save(function(err) {
				should.not.exist(err);
				done();
			});
		});

		it('should be able to show an error when try to save without name', function(done) { 
			phonemenu.name = '';

			return phonemenu.save(function(err) {
				should.exist(err);
				done();
			});
		});
	});

	afterEach(function(done) { 
		Phonemenu.remove().exec();
		User.remove().exec();

		done();
	});
});