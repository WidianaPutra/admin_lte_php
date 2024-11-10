<?php
?>
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