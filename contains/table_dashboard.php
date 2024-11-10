<?php
include "./utils/alert.php";

if (isset($_GET['dashboard'])) {
  $queryURL = $_GET['dashboard'];

  if ($queryURL == "siswa") {
    include "./contains/dashboard/siswa.php";
  } elseif ($queryURL == "guru") {
    include "./contains/dashboard/guru.php";
  } elseif ($queryURL == "jurusan") {
    include "./contains/dashboard/jurusan.php";
  } elseif ($queryURL == "kelas") {
    include "./contains/dashboard/kelas.php";
  } else {
    include "./contains/dashboard/siswa.php";
  }
}