<?php
header("Content-Type: application/json; charset=UTF-8");

// requirements and include files
require 'sql.php';

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
	die('{"error": true, "message": "' . mysqli_connect_error() . '", "records":[ ]}');
}

// get the query
$result = mysqli_query($conn, "SELECT * FROM Computer");
$output = "";

// if there are results
if (mysqli_num_row($result) > 0) {
	// build json for every entry
	while ($row = mysqli_fetch_assoc($result)) {
		if ($output != "") {
			$output .= ",";
		}
		
		$output .= '{"id":"'        . $row["id"]         . '",';
		$output .= '"mac":"'        . $row["mac"]        . '",';
		$output .= '"name":"'       . $row["name"]       . '",';
		$output .= '"location":"'   . $row["location"]   . '",';
		$output .= '"type":"'       . $row["type"]       . '",';
		$output .= '"function":"'   . $row["function"]   . '",';
		$output .= '"production":"' . $row["production"] . '",';
		$output .= '"manager":"'    . $row["manager"]    . '"}';
	}
	
	// build finished json entry
	$output = '{"error": false, "records":[' . $output . ']}';
	
} else {
	// build empty json entry
	$output = '{"error": false, "records":[ ]}';
}

// close the connection
mysqli_close($conn);

// output json
echo($output);
?>