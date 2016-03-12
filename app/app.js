var app = angular.module('mainModule', []);

app.config(function ($routeProvider) {
	$routeProvider
		.when('/',
			{
				controller: 'computerController',
				templateUrl: './app/partials/computersList.html'
			})
		.otherwise({ redirectTo: '/'});
});