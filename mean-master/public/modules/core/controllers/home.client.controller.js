'use strict';


angular.module('core').controller('HomeController', ['$scope', '$location', 'Authentication', 'Phonemenus',
	function($scope, $location, Authentication, Phonemenus) {
		// This provides Authentication context.
		$scope.authentication = Authentication;

		if (!$scope.authentication.user) {
			$location.path('/landing');
		}

		$scope.menuitem = 0;
		$scope.menus = Phonemenus.query();

		$scope.update = function() {
			alert('ghhdsghj');
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