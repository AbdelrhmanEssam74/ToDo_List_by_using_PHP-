<?php

require "conn.php";

if (isset($_GET['del_id'])) {
	$id = $_GET['del_id'];

	$data = $conn->query("SELECT * FROM tasks");
	$rows = $data->fetchAll(PDO::FETCH_OBJ);

	$task = "";
	foreach ($rows as $row) {
		if ($row->id == $id) {
			$task .= $row->task_name;
			break;
		}
	}

	$insert = $conn->prepare("INSERT INTO Tasks_completed (task_name) VALUES (:name)");
	$insert->bindParam(":name", $task);
	$insert->execute();

	$delete = $conn->prepare("DELETE FROM tasks WHERE id=:id");
	$delete->execute([':id' => $id]);

	header("location: index.php");
}
