<?php
$conn = new mysqli("localhost", "suriya", "surya15022005", "data_sekolah");

function querytoDbReturn($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function queryToDb($query)
{
  global $conn;
  return mysqli_query($conn, $query);
}