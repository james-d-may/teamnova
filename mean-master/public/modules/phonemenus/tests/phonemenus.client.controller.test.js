'use strict';

(function() {
	// Phonemenus Controller Spec
	describe('Phonemenus Controller Tests', function() {
		// Initialize global variables
		var PhonemenusController,
		scope,
		$httpBackend,
		$stateParams,
		$location;

		// The $resource service augments the response object with methods for updating and deleting the resource.
		// If we were to use the standard toEqual matcher, our tests would fail because the test values would not match
		// the responses exactly. To solve the problem, we define a new toEqualData Jasmine matcher.
		// When the toEqualData matcher compares two objects, it takes only object properties into
		// account and ignores methods.
		beforeEach(function() {
			jasmine.addMatchers({
				toEqualData: function(util, customEqualityTesters) {
					return {
						compare: function(actual, expected) {
							return {
								pass: angular.equals(actual, expected)
							};
						}
					};
				}
			});
		});

		// Then we can start by loading the main application module
		beforeEach(module(ApplicationConfiguration.applicationModuleName));

		// The injector ignores leading and trailing underscores here (i.e. _$httpBackend_).
		// This allows us to inject a service but then attach it to a variable
		// with the same name as the service.
		beforeEach(inject(function($controller, $rootScope, _$location_, _$stateParams_, _$httpBackend_) {
			// Set a new global scope
			scope = $rootScope.$new();

			// Point global variables to injected services
			$stateParams = _$stateParams_;
			$httpBackend = _$httpBackend_;
			$location = _$location_;

			// Initialize the Phonemenus controller.
			PhonemenusController = $controller('PhonemenusController', {
				$scope: scope
			});
		}));

		it('$scope.find() should create an array with at least one Phonemenu object fetched from XHR', inject(function(Phonemenus) {
			// Create sample Phonemenu using the Phonemenus service
			var samplePhonemenu = new Phonemenus({
				name: 'New Phonemenu'
			});

			// Create a sample Phonemenus array that includes the new Phonemenu
			var samplePhonemenus = [samplePhonemenu];

			// Set GET response
			$httpBackend.expectGET('phonemenus').respond(samplePhonemenus);

			// Run controller functionality
			scope.find();
			$httpBackend.flush();

			// Test scope value
			expect(scope.phonemenus).toEqualData(samplePhonemenus);
		}));

		it('$scope.findOne() should create an array with one Phonemenu object fetched from XHR using a phonemenuId URL parameter', inject(function(Phonemenus) {
			// Define a sample Phonemenu object
			var samplePhonemenu = new Phonemenus({
				name: 'New Phonemenu'
			});

			// Set the URL parameter
			$stateParams.phonemenuId = '525a8422f6d0f87f0e407a33';

			// Set GET response
			$httpBackend.expectGET(/phonemenus\/([0-9a-fA-F]{24})$/).respond(samplePhonemenu);

			// Run controller functionality
			scope.findOne();
			$httpBackend.flush();

			// Test scope value
			expect(scope.phonemenu).toEqualData(samplePhonemenu);
		}));

		it('$scope.create() with valid form data should send a POST request with the form input values and then locate to new object URL', inject(function(Phonemenus) {
			// Create a sample Phonemenu object
			var samplePhonemenuPostData = new Phonemenus({
				name: 'New Phonemenu'
			});

			// Create a sample Phonemenu response
			var samplePhonemenuResponse = new Phonemenus({
				_id: '525cf20451979dea2c000001',
				name: 'New Phonemenu'
			});

			// Fixture mock form input values
			scope.name = 'New Phonemenu';

			// Set POST response
			$httpBackend.expectPOST('phonemenus', samplePhonemenuPostData).respond(samplePhonemenuResponse);

			// Run controller functionality
			scope.create();
			$httpBackend.flush();

			// Test form inputs are reset
			expect(scope.name).toEqual('');

			// Test URL redirection after the Phonemenu was created
			expect($location.path()).toBe('/phonemenus/' + samplePhonemenuResponse._id);
		}));

		it('$scope.update() should update a valid Phonemenu', inject(function(Phonemenus) {
			// Define a sample Phonemenu put data
			var samplePhonemenuPutData = new Phonemenus({
				_id: '525cf20451979dea2c000001',
				name: 'New Phonemenu'
			});

			// Mock Phonemenu in scope
			scope.phonemenu = samplePhonemenuPutData;

			// Set PUT response
			$httpBackend.expectPUT(/phonemenus\/([0-9a-fA-F]{24})$/).respond();

			// Run controller functionality
			scope.update();
			$httpBackend.flush();

			// Test URL location to new object
			expect($location.path()).toBe('/phonemenus/' + samplePhonemenuPutData._id);
		}));

		it('$scope.remove() should send a DELETE request with a valid phonemenuId and remove the Phonemenu from the scope', inject(function(Phonemenus) {
			// Create new Phonemenu object
			var samplePhonemenu = new Phonemenus({
				_id: '525a8422f6d0f87f0e407a33'
			});

			// Create new Phonemenus array and include the Phonemenu
			scope.phonemenus = [samplePhonemenu];

			// Set expected DELETE response
			$httpBackend.expectDELETE(/phonemenus\/([0-9a-fA-F]{24})$/).respond(204);

			// Run controller functionality
			scope.remove(samplePhonemenu);
			$httpBackend.flush();

			// Test array after successful delete
			expect(scope.phonemenus.length).toBe(0);
		}));
	});
}());