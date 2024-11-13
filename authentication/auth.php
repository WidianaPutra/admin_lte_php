<?php
session_start();

if (isset($_SESSION['account_id']) && isset($_SESSION['id'])) {
  // if (isset($_COOKIE['account_id']) && isset($_COOKIE['username'])) {
  $account_id = $_SESSION['account_id'];
  $username = $_SESSION['username'];

  $query = $conn->query("SELECT * FROM sessions WHERE account_id = '$account_id' AND username = '$username'");

  if ($query->num_rows > 0) {
    header("Location: ./");
    exit();
  } else {
    header("Location: ./authentication.php");
    exit();
  }
  // }
} else {
  header("Location: ./authentication.php");
  exit();
}
