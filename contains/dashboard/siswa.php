<?php
$datas = querytoDb("SELECT * FROM siswa LEFT JOIN kelas ON siswa.kelas = kelas.kode_kelas");
?>
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
          <td><?= $data['singkatan'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>