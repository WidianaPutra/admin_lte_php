<?php
$conn = new mysqli("localhost", "suriya", "surya15022005", "data_sekolah");

function querytoDb($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}