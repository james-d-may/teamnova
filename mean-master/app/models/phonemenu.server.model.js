'use strict';

/**
 * Module dependencies.
 */
var mongoose = require('mongoose'),
	Schema = mongoose.Schema;

/**
 * Phonemenu Schema
 */
var PhonemenuSchema = new Schema({
	name: {
		type: String,
		default: '',
		required: 'Please fill Phonemenu name',
		trim: true
	},
	created: {
		type: Date,
		default: Date.now
	},
	user: {
		type: Schema.ObjectId,
		ref: 'User'
	}
});

mongoose.model('Phonemenu', PhonemenuSchema);