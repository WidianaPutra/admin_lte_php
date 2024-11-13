<?php
$datas = querytoDb("SELECT * FROM kejuruan");

?>
<div class="container-fluid my-5">
  <h1>Table Jurusan</h1>
  <table class="table table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Kode jurusan</th>
        <th>Singkatan</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($datas as $i => $data): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['code'] ?></td>
          <td><?= $data['singkatan'] ?></td>
          <td class="d-flex align-items-center justify-content-center">
            <button class="edit bg-success px-3 py-2 rounded" style="border: none;">
              <i class='fas fa-edit' style="color: #fff;" index="
            <?= $data['code'] ?>"></i>
            </button>
            <p class="px-3 rounded">|</p>
            <button class="delete bg-danger px-3 py-2 rounded" style="border: none;" index="<?= $data['code'] ?>">
              <i class='fas fa-trash-alt' style=" color: #fff;"></i>
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
  $("button.edit").click(function () {
    const code_jurusan = $(this).attr('index');
  })

  $("button.delete").click(function () {
    const code_jurusan = $(this).attr('index');
    Swal.fire({
      title: "Apakah anda yakin ingin menghapus data ini?",
      // showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak",
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Data berhasil dihapus",
          icon: "success",
        })
        // window.location.href = `./delete.php?table=guru&parameter=${kodeGuru}&row=code_guru`;
        window.location.href = `./delete.php?table=kejuruan&parameter=${code_jurusan}&row=code`;
      }
    })
  })
</script>