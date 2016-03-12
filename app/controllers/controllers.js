app.controller('computerController', function($scope, $http) {
	$http.get("./sql/computers.php")
		.then(function(response) {
			$scope.computers = response.data.records;
		});
});