<?php

require "database.php";

$supp = $database->prepare("DELETE FROM tweets WHERE id = :id");
$supp->execute([
  "id" => $_POST["supp"],
]);

header("Location: ../index.php");
