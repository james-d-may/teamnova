'use strict';

//Phonemenus service used to communicate Phonemenus REST endpoints
angular.module('phonemenus').factory('Phonemenus', ['$resource',
	function($resource) {
		return $resource('phonemenus/:phonemenuId', { phonemenuId: '@_id'
		}, {
			update: {
				method: 'PUT'
			}
		});
	}
]);