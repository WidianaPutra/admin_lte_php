<section class="content-wrapper">
  <?php
  if (isset($_GET["table"])) {
    $queryURL = strtolower($_GET['table']);

    if ($queryURL == "siswa") {
      include "./contains/tables/siswa.php";
    } elseif ($queryURL == "guru") {
      include "./contains/tables/guru.php";
    } elseif ($queryURL == "jurusan") {
      include "./contains/tables/jurusan.php";
    } elseif ($queryURL == "kelas") {
      include "./contains/tables/kelas.php";
    } else {
      include "./contains/tables/siswa.php";
    }
  }
  ?>
</section>