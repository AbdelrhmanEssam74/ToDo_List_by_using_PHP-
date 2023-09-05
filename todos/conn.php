<?php

try {

	$host = "localhost";
	$dbname = "todo";
	$user = "Admin1";
	$pass = "a123";

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

	echo "error is: " . $e->getMessage();
}
