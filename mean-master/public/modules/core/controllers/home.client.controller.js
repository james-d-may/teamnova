'use strict';


angular.module('core').controller('HomeController', ['$scope', 'Authentication',
	function($scope, Authentication) {
		// This provides Authentication context.
		$scope.authentication = Authentication;
	}

]);

angular.module('core').controller('HomeController', function ($scope) {
  $scope.tabs = [{
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
		},
		'2': {
			text: 'Press two to leave a voice message',
			action: 'voicemail'
		}
	}
},{
	name: 'Default2',
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
		},
		'2': {
			text: 'Press two to leave a voice message',
			action: 'voicemail'
		}
	}
}];

  $scope.alertMe = function() {
    setTimeout(function() {
      alert('You\'ve selected the alert tab!');
    });
  };
});