// //Define an angular module for our app
// var cuponapp = angular.module('cuponapp', ['ngRoute']);

// cuponapp.config(['$routeProvider', '$locationProvider',
// 	function($routeProvider, $locationProvider) {
// 		$routeProvider.when('/voucher/:voucherId', {
// 			templateUrl: '/partials/voucher.html',
// 			controller: 'voucherController',
// 			controllerAs: 'voucher'
// 		});
// 		// configure html5 to get links working on jsfiddle
// 		$locationProvider.html5Mode(true);
// 	}
// ]);

// cuponapp.controller('MainCtrl', ['$route', '$routeParams', '$location',
// 	function($route, $routeParams, $location) {
// 		this.$route = $route;
// 		this.$location = $location;
// 		this.$routeParams = $routeParams;
// 	}
// ]);

// cuponapp.controller('voucherController', ['$routeParams', 
// 	function($routeParams) {
// 		this.name = "voucherController";
// 		this.params = $routeParams;
// 	}
// ]);

// define angular module/app
var cuponapp = angular.module('cuponapp', []);

// create angular controller and pass in $scope and $http
function formController($scope, $http) {

	// create a blank object to hold our form information
	// $scope will allow this to pass between controller and view
	$scope.user = {};

	// process the form
	$scope.processForm = function(isValid) {
		console.log(isValid);
		if (isValid) {
			$scope.user.mobileCompany = $scope.user.mobileCompany.id;
			$scope.user.profession = $scope.user.profession.id;
			$http({
				method  : 'POST',
				url     : 'index.php/users',
				data    : $.param($scope.user),  // pass in data as strings
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			}).
			success(function(data, status, headers, config) {
				console.log(data);
				console.log(status);
				$scope.message = data;
			}).
			error(function(data, status, headers, config) {
				console.log(data);
				console.log(status);
				$scope.message = data;
			});
		};
	};
};

function professionController($scope, $http) {
	$scope.professions = [];
	$http({
		method  : 'GET',
		url     : 'index.php/professions'
	}).
	success(function(data, status, headers, config) {
		$scope.professions = $.map(
			data,
			function( profession ) {
 				// NOTE: "Value" here will reference our
 				// friend object, which will be mirrored
 				// in the selection variable.
 				return({
 					value: profession,
 					text: profession.name
				});
 			}
		);
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
		url     : 'index.php/mobileCompanies'
	}).
	success(function(data, status, headers, config) {
		$scope.mobileCompanies = $.map(
			data,
			function( mobileCompany ) {
 				// NOTE: "Value" here will reference our
 				// friend object, which will be mirrored
 				// in the selection variable.
 				return({
 					value: mobileCompany,
 					text: mobileCompany.name
				});
 			}
		);
	}).
	error(function(data, status, headers, config) {
		console.log(data);
		console.log(status);
	});
};