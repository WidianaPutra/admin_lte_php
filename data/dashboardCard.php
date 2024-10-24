<?php
require("./db/db.php");
$siswa = querytoDbReturn("SELECT * FROM siswa");
$guru = querytoDbReturn("SELECT * FROM guru");
$kelas = querytoDbReturn("SELECT * FROM kelas");
$jurusan = querytoDbReturn("SELECT * FROM kejuruan");

$datas = [
  ["title" => "Siswa", "data" => $siswa, "color" => "bg-info"],
  ["title" => "Guru", "data" => $guru, "color" => "bg-success"],
  ["title" => "Kelas", "data" => $kelas, "color" => "bg-warning"],
  ["title" => "Jurusan", "data" => $jurusan, "color" => "bg-danger"],
];