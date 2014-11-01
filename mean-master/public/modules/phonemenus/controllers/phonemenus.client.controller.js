'use strict';

// Phonemenus controller
angular.module('phonemenus').controller('PhonemenusController', ['$scope', '$stateParams', '$location', 'Authentication', 'Phonemenus',
	function($scope, $stateParams, $location, Authentication, Phonemenus ) {
		$scope.authentication = Authentication;

		// Create new Phonemenu
		$scope.create = function() {
			// Create new Phonemenu object
			var phonemenu = new Phonemenus ({
				name: this.name
			});

			// Redirect after save
			phonemenu.$save(function(response) {
				$location.path('phonemenus/' + response._id);

				// Clear form fields
				$scope.name = '';
			}, function(errorResponse) {
				$scope.error = errorResponse.data.message;
			});
		};

		// Remove existing Phonemenu
		$scope.remove = function( phonemenu ) {
			if ( phonemenu ) { phonemenu.$remove();

				for (var i in $scope.phonemenus ) {
					if ($scope.phonemenus [i] === phonemenu ) {
						$scope.phonemenus.splice(i, 1);
					}
				}
			} else {
				$scope.phonemenu.$remove(function() {
					$location.path('phonemenus');
				});
			}
		};

		// Update existing Phonemenu
		$scope.update = function() {
			var phonemenu = $scope.phonemenu ;

			phonemenu.$update(function() {
				$location.path('phonemenus/' + phonemenu._id);
			}, function(errorResponse) {
				$scope.error = errorResponse.data.message;
			});
		};

		// Find a list of Phonemenus
		$scope.find = function() {
			$scope.phonemenus = Phonemenus.query();
		};

		// Find existing Phonemenu
		$scope.findOne = function() {
			$scope.phonemenu = Phonemenus.get({ 
				phonemenuId: $stateParams.phonemenuId
			});
		};
	}
]);