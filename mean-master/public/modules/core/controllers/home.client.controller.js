'use strict';

Array.prototype.remove = function(from, to) {
  var rest = this.slice((to || from) + 1 || this.length);
  this.length = from < 0 ? this.length + from : from;
  return this.push.apply(this, rest);
};

angular.module('core').controller('HomeController', ['$scope', '$location', 'Authentication', 'Users',
	function($scope, $location, Authentication, Users) {
		// This provides Authentication context.
		$scope.authentication = Authentication;

		$scope.user = Authentication.user;

		if (!$scope.user) {
			$location.path('/landing');
		}

		$scope.menuitem = 0;
		if (!$scope.user.activeMenu) {
			$scope.user.activeMenu = {
				name: 'Active',
				options: [

				]
			};
		}
		if (!$scope.user.busyMenu) {
			$scope.user.busyMenu = {
				name: 'Busy',
				options: []
			};
		}
		$scope.menus = [$scope.user.activeMenu, $scope.user.busyMenu];

		$scope.new2 = function() {
			$scope.menus[0].options.push({text: 'New menu option', action: 'redirect', phonenumber: '07757672217'});
		};

		$scope.delete = function(i) {
			$scope.menus[0].options.remove(i);
			$scope.update();
		};

		$scope.update = function() {
			$scope.user.activeMenu = $scope.menus[0];
			$scope.user.busyMenu = $scope.menus[1];
			var user = new Users($scope.user);
	
			user.$update(function(response) {
				$scope.success = true;
				Authentication.user = response;
			}, function(response) {
				$scope.error = response.data.message;
			});

		};
		$scope.alertMe = function() {
		    setTimeout(function() {
		      alert('You\'ve selected the alert tab!');
		    });
		};

		$scope.showmenu = function(i){
		  	$scope.menus[$scope.menuitem].active = undefined;
		  	$scope.menuitem = i;
		  	$scope.menus[$scope.menuitem].active = 'active';
		};


		/*$scope.menuitem = 0;
	    $scope.menus = [{
			name: 'Customers',
			created: '637263872163',
			user: {
				displayName: 'Taimur',
				phonenumber: 'hjdhsjkdahjks'
			},
			options: [
				{
					text: 'Press one to talk to Tetris department.',
					action: 'redirect',
					phonenumber: '911'
				},
				{
					text: 'Press two to talk to Nerd department.',
					action: 'voicemail'
				},{
					text: 'Press three to talk to a specific person.',
					action: 'submenu',
					options: [
						{
							text: 'Press one to talk to Tetris department.',
							action: 'redirect',
							phonenumber: '911'
						},
						{
							text: 'Press two to talk to Nerd department.',
							action: 'voicemail'
						}]
				}
			]
		},{
			name: 'Holiday',
			created: '637263872163',
			user: {
				displayName: 'Taimur',
				phonenumber: 'hjdhsjkdahjks'
			},
			options: [
				{
					text: 'Press one to call 911.',
					action: 'redirect',
					phonenumber: '911'
				},
				{
					text: 'Press two to leave a voice message.',
					action: 'voicemail'
				}
			]
		}];*/

	}

]);

angular.module('core').controller('AccordionDemoCtrl', ['$scope', function ($scope) {

  $scope.addItem = function() {
    var newItemNo = $scope.items.length + 1;
    $scope.items.push('Item ' + newItemNo);
  };

  $scope.status = {
    isFirstOpen: true,
    isFirstDisabled: false
  };
}]);

angular.module('core').controller('SelectLocalCtrl', ['$scope', '$filter', function($scope, $filter) {

  $scope.statuses = [
    {value: 'redirect', text: 'Redirect Call'},
    {value: 'submenu', text: 'New Menu'},
    {value: 'voicemail', text: 'Record Voicemail'},
    {value: 'text', text: 'Recite Text'}
  ]; 

  $scope.showStatus = function() {
    var selected = $filter('filter')($scope.statuses, {value: $scope.user.status});
    return ($scope.user.status && selected.length) ? selected[0].text : 'Not set';
  };
}]);