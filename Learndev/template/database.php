<?php

try {
  $database = new PDO("mysql:host=localhost;dbname=learndev", "root", "");
} catch (PDOException $error) {
  die($error);
}
?>
