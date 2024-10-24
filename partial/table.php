<?php
$query = $_GET['dashboard'] ?? "siswa";
$datas = querytoDbReturn("SELECT * FROM $query");
?>

<?php if ($query === "siswa" || empty($query)): ?>
  <div class="container-fluid my-5">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>No.</th>
          <th>nis</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Jk.</th>
          <th>Email</th>
          <th>No. Tel</th>
          <th>Kelas</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datas as $i => $data): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $data['nis'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['JK'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['telepon'] ?></td>
            <td><?= $data['kelas'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php
endif;
if ($query === "guru"): ?>
  <div class="container-fluid my-5">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>No.</th>
          <th>Kode guru</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Jk.</th>
          <th>Email</th>
          <th>No. Tel</th>
          <th>Kelas</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datas as $i => $data): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $data['code_guru'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['JK'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['telepon'] ?></td>
            <td><?= $data['kelas'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif;
if ($query === "kejuruan"): ?>
  <div class="container-fluid my-5">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>No.</th>
          <th>Singkatan</th>
          <th>Nama</th>
          <th>Kode</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datas as $i => $data): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $data['singkatan'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['code'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif;
if ($query === "kelas"): ?>
  <div class="container-fluid my-5">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>No.</th>
          <th>Kelas</th>
          <th>Kode</th>
          <th>Singkatan</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datas as $i => $data): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $data['kelas'] ?></td>
            <td><?= $data['kode_kelas'] ?></td>
            <td><?= $data['singkatan'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>