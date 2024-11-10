<?php
include "./utils/alert.php";

if (isset($_GET['form'])) {
  $queryURL = strtolower($_GET['form']);

  if ($queryURL == "siswa") {
    include "./contains/forms/siswa.php";
  } elseif ($queryURL == "guru") {
    include "./contains/forms/guru.php";
  } elseif ($queryURL == "jurusan") {
    include "./contains/forms/jurusan.php";
  } elseif ($queryURL == "kelas") {
    include "./contains/forms/kelas.php";
  } else {
    include "./contains/tables/siswa.php";
  }
}