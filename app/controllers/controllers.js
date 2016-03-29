app.controller('computerController', function($scope, $http) {
	$http.get("./sql/computers.php")
		.then(function(response) {
			$scope.computers = response.data.records;
		});
	
	$scope.dataCollumns = ["mac", "name", "location", "type", "function", "manager", "production"];
	
	$scope.table = [
		{ header: "MAC-Addressen", data: "mac" },
		{ header: "Name", data: "name" },
		{ header: "Standort", data: "location" },
		{ header: "Computer-Typ", data: "type" },
		{ header: "Funktion", data: "function" },
		{ header: "Verantwortlicher", data: "manager" }
	];
});