'use strict';

// Configuring the Articles module
angular.module('phonemenus').run(['Menus',
	function(Menus) {
		// Set top bar menu items
		Menus.addMenuItem('topbar', 'Phonemenus', 'phonemenus', 'dropdown', '/phonemenus(/create)?');
		Menus.addSubMenuItem('topbar', 'phonemenus', 'List Phonemenus', 'phonemenus');
		Menus.addSubMenuItem('topbar', 'phonemenus', 'New Phonemenu', 'phonemenus/create');
	}
]);