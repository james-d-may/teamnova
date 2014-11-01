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
	},
	submenus: {}
});
/*
SAMPLE:
{
	name: 'Default',
	created: '637263872163',
	user: {
		displayName: 'Taimur',
		phonenumber: 'hjdhsjkdahjks'
	},
	submenus: {
		'1': {
			text: 'Press one to call 911',
			action: 'submenu',
			submenu: {
				'-1': {
					action: 'redirect',
					phonenumber: '911'
				}
			}
		}
		'2': {
			text: 'Press two to leave a voice message',
			action: 'voicemail'
		}
	}
}
*/

mongoose.model('Phonemenu', PhonemenuSchema);