<?php
include "./authentication/auth.php";
include "./partial/header.php";

if (isset($_GET['auth'])) {
  $auth_query = strtolower($_GET['auth']);

  if ($auth_query === "login")
    return include "./authentication/login.php";
  return include "./authentication/register.php";
} else {
  return include "./authentication/login.php";
}
