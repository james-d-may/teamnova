'use strict';

//Setting up route
angular.module('phonemenus').config(['$stateProvider',
	function($stateProvider) {
		// Phonemenus state routing
		$stateProvider.
		state('listPhonemenus', {
			url: '/phonemenus',
			templateUrl: 'modules/phonemenus/views/list-phonemenus.client.view.html'
		}).
		state('createPhonemenu', {
			url: '/phonemenus/create',
			templateUrl: 'modules/phonemenus/views/create-phonemenu.client.view.html'
		}).
		state('viewPhonemenu', {
			url: '/phonemenus/:phonemenuId',
			templateUrl: 'modules/phonemenus/views/view-phonemenu.client.view.html'
		}).
		state('editPhonemenu', {
			url: '/phonemenus/:phonemenuId/edit',
			templateUrl: 'modules/phonemenus/views/edit-phonemenu.client.view.html'
		});
	}
]);