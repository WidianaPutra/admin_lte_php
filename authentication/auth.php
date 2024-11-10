<?php
if (isset($_COOKIE['account_id']) && isset($_COOKIE['username'])) {
  $account_id = $_COOKIE['account_id'];
  $username = $_COOKIE['username'];
  $query = $conn->query("SELECT * FROM sessions WHERE account_id = '$account_id'");
  $result = $query->fetch_assoc();

  if ($query->num_rows > 0 && $username === $result['username']) {
    return header("Location ./");
  }

  return header("Location: ./authentication.php");
} else
  header("Location: ./authentication.php");
