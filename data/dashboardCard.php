<?php
require("./db/db.php");
$siswa = querytoDb("SELECT * FROM siswa");
$guru = querytoDb("SELECT * FROM guru");
$kelas = querytoDb("SELECT * FROM kelas");
$jurusan = querytoDb("SELECT * FROM kejuruan");

$datas = [
  ["title" => "Siswa", "data" => $siswa, "color" => "bg-info"],
  ["title" => "Guru", "data" => $guru, "color" => "bg-success"],
  ["title" => "Kelas", "data" => $kelas, "color" => "bg-warning"],
  ["title" => "Jurusan", "data" => $jurusan, "color" => "bg-danger"],
];