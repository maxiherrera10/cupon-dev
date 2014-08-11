// define angular module/app
var cuponapp = angular.module('cuponapp', []);

// create angular controller and pass in $scope and $http
function formController($scope, $http) {

	// create a blank object to hold our form information
	// $scope will allow this to pass between controller and view
	$scope.customer = {};

	// process the form
	$scope.processForm = function(isValid) {
		if (isValid) {
			$scope.customer.mobileCompany = $scope.customer.mobileCompany.id;
			$scope.customer.profession = $scope.customer.profession.id;
			$http({
				method  : 'POST',
				url     : '/app.php/customers',
				data    : $.param($scope.customer),  // pass in data as strings
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			}).
			success(function(data, status, headers, config) {
				console.log(data);
				$scope.message = data;
				$scope.check = true;
			}).
			error(function(data, status, headers, config) {
				console.log(data);
				$scope.message = data;
			});
		};
	};
};

function professionController($scope, $http) {
	$scope.professions = [];
	$http({
		method  : 'GET',
		url     : '/app.php/professions'
	}).
	success(function(data, status, headers, config) {
		$scope.professions = data;
		$scope.customer.profession = $scope.professions[1]; // ama de casa
	}).
	error(function(data, status, headers, config) {
		console.log(data);
		console.log(status);
	});
};

function mobileCompaniesController($scope, $http) {
	$scope.mobileCompanies = [];
	$http({
		method  : 'GET',
		url     : '/app.php/mobileCompanies'
	}).
	success(function(data, status, headers, config) {
		$scope.mobileCompanies = data;
		$scope.customer.mobileCompany = $scope.mobileCompanies[1]; // Claro
	}).
	error(function(data, status, headers, config) {
		console.log(data);
		console.log(status);
	});
};

function defaultValueRadioController($scope, $http) {
	$scope.customer.sons = '1';
}