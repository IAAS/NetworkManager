app.controller('computerController', function($scope, $http) {
	$http.get("./sql/computers.php")
		.then(function(response) {
			$scope.computers = response.data.records;
		});
	
	$scope.dataCollumns = ["mac", "name", "location", "type", "function", "manager", "production"];
	
	$scope.tableHeader = ["MAC-Addressen", "Name", "Standort", "Computer-Typ", "Funktion", "Verantwortlicher"];
	$scope.tableCollumns = ["mac", "name", "location", "type", "function", "manager"];
	
});