<?php require "database.php";
session_start();
$insert = $database->prepare(
  "INSERT INTO tweets (tweet, user_id) VALUES (:tweeter, :user_id)"
);
$insert->execute([
  "tweeter" => $_POST["tweeter"],
  "user_id" => $_SESSION['user'],
]);

header("Location: ../index.php");
