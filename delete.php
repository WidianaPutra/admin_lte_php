<?php
include "./db/db.php";

if (isset($_GET['parameter']) && isset($_GET['table']) && isset($_GET['row'])) {
  $table = $_GET['table'];
  $parameter = $_GET['parameter'];
  $row = $_GET['row'];
  $sql = "DELETE FROM $table WHERE $row = '$parameter'";
  $conn->query($sql);
  header("Location: " . $_SERVER['HTTP_REFERER']);
}