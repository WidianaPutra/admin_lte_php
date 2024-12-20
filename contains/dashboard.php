<?php
$siswa = querytoDb("SELECT * FROM siswa");
$guru = querytoDb("SELECT * FROM guru");
$kelas = querytoDb("SELECT * FROM kelas");
$jurusan = querytoDb("SELECT * FROM kejuruan");

$datas = [
  ["title" => "Siswa", "data" => count($siswa), "color" => "bg-info"],
  ["title" => "Guru", "data" => count($guru), "color" => "bg-success"],
  ["title" => "Kelas", "data" => count($kelas), "color" => "bg-warning"],
  ["title" => "Jurusan", "data" => count($jurusan), "color" => "bg-danger"],
];
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php foreach ($datas as $data): ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box <?= $data['color'] ?>">
              <div class="inner">
                <h3><?= $data['data'] ?></h3>
                <p><?= $data['title'] ?></p>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div><!-- /.container-fluid -->
    <?php include("./contains/table_dashboard.php") ?>
  </section>
  <!-- /.content -->
</div>