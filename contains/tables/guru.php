<?php
$datas = querytoDb("SELECT * FROM guru LEFT JOIN kelas ON guru.kelas = kelas.kode_kelas");

?>
<div class="container-fluid my-5">
  <h1>Table Guru</h1>
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
        <th>Actions</th>
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
            <td class="d-flex align-items-center justify-content-center">
              <button class="edit bg-success px-3 py-2 rounded" style="border: none;">
                <i class='fas fa-edit' style="color: #fff;" index="
            <?= $data['code_guru'] ?>"></i>
              </button>
              <p class="px-3 rounded">|</p>
              <button class="delete bg-danger px-3 py-2 rounded" style="border: none;" index="<?= $data['code_guru'] ?>">
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
    const kodeGuru = $(this).attr('index');
  })

  $("button.delete").click(function () {
    const kodeGuru = $(this).attr('index');
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
        window.location.href = `./delete.php?table=guru&parameter=${kodeGuru}&row=code_guru`;
      }
    })
  })
</script>