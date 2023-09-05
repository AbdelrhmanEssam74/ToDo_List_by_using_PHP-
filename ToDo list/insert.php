<?php

require "conn.php";

if (isset($_POST["submit"])) {

   $task = $_POST['mytask'];

   $insert = $conn->prepare("INSERT INTO tasks (task_name) VALUES (:name)");

   $insert->execute([':name' => $task]);

   header("location: index.php");
}
