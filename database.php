#!/bin/php
<?php

// requirements and include files
require 'settings.php';

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
	die("[FAIL] Connection could not be established because of:<br>" . mysqli_connect_error());
}

// check what to do
switch ($_GET["action"]) {
	case "purge":
		execute_command_block($conn, SQL_CLEAR_DATABASE_COMMANDS, SQL_CLEAR_DATABASE_DESCRIPTIONS);
	case "setup":
		execute_command_block($conn, SQL_CREATE_DATABASE_COMMANDS, SQL_CREATE_DATABASE_DESCRIPTIONS);
		break;
	case "drop":
		execute_command_block($conn, SQL_CLEAR_DATABASE_COMMANDS, SQL_CLEAR_DATABASE_DESCRIPTIONS);
		break;
	case "execute":
		if (!empty($_GET["command"]) && !empty($_GET["info"])) {
			send_sql_command($conn, $_GET["command"], $_GET["info"]);
		}
		break;
	default:
		echo "[FAIL] unknown action <br>";
}

// close the connection
mysqli_close($conn);

// function to execute sql commands and optionally create debug messages
function send_sql_command($conn, $command, $info) {
	if (mysqli_query($conn, $command)) {
		echo "[OK] " . $info . "<br>";
	} else {
		echo "[FAIL] " . $info . "<br>";
		if (DEBUG) {
			echo "[SQL] [ERROR] " . mysqli_error($conn) . "<br>";
		}
	}
}

// function to execute a preset block of commands
function execute_command_block($conn, $command, $description) {
	$commands     = json_decode($command);
	$descriptions = json_decode($description);
	$count        = min(count($commands), count($descriptions));

	for ($i = 0; $i < $count; $i++) {
		send_sql_command($conn, $commands[$i], $descriptions[$i]);
	}
}
?>