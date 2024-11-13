<?php
include "./utils/alert.php";

if (isset($_GET['edit'])) {
  $queryURL = strtolower($_GET['edit']);

  if ($queryURL == "siswa") {
    include "./contains/edit/siswa.php";
  } elseif ($queryURL == "guru") {
    include "./contains/edit/guru.php";
  } elseif ($queryURL == "jurusan") {
    include "./contains/edit/jurusan.php";
  } elseif ($queryURL == "kelas") {
    include "./contains/edit/kelas.php";
  } else {
    include "./contains/tables/siswa.php";
  }
}