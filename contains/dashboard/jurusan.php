<?php
?>
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