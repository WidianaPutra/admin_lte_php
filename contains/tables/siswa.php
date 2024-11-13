<?php
$filter = "";

if (isset($_POST['filter'])) {
  $filter = $_POST['filter'];
  if ($filter === 'all') {
    $filter = "";
  }
}

$querysCondition = $filter === "" ? "" : "WHERE kode_kelas = '$filter'";
$data_kelas = querytoDb("SELECT * FROM kelas");

$datas = querytoDb("SELECT * FROM siswa LEFT JOIN kelas ON siswa.kelas = kelas.kode_kelas $querysCondition");
?>

<div class="container-fluid my-5">
  <h1>Table Siswa</h1>
  <!-- Form filter -->
  <form method="POST" class="mb-3">
    <label for="filter">Filter berdasarkan kelas:</label>
    <select name="filter" id="filter" onchange="this.form.submit();">
      <option value="all" <?= $filter === "" ? "selected" : "" ?>>Semua</option>
      <?php foreach ($data_kelas as $data): ?>
        <option value="<?php echo $data['kode_kelas']; ?>" <?= $filter === $data['kode_kelas'] ? "selected" : "" ?>>
          <?php echo $data['kelas']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </form>

  <!-- Tabel data siswa -->
  <table class="table table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>No.</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>JK</th>
        <th>Email</th>
        <th>No. Tel</th>
        <th>Kelas</th>
        <th>Actions</th>
      </tr>
    </thead>
    <?php if (count($datas) > 0): ?>
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
            <td class="d-flex align-items-center justify-content-center">
              <button class="edit bg-success px-3 py-2 rounded" style="border: none;" index="<?= $data['nis'] ?>">
                <i class='fas fa-edit' style="color: #fff;"></i>
              </button>
              <p class="px-3 rounded">|</p>
              <button class="delete bg-danger px-3 py-2 rounded" style="border: none;" index="<?= $data['nis'] ?>">
                <i class='fas fa-trash-alt' style=" color: #fff;"></i>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    <?php else: ?>
      <tbody>
        <tr>
          <td colspan="9" class="text-center">Data tidak ada</td>
        </tr>
      </tbody>
    <?php endif ?>
  </table>
</div>

<script>
  $("button.edit").click(function () {
    const parameter = $(this).attr('index');
    window.location.href = `./?edit=siswa&key=${parameter}`;
  })

  $("button.delete").click(function () {
    const parameter = $(this).attr('index');
    Swal.fire({
      title: "Apakah anda yakin ingin menghapus data ini?",
      showCancelButton: true,
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak",
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Data berhasil dihapus",
          icon: "success",
        })
        window.location.href = `./delete.php?table=siswa&parameter=${parameter}&row=nis`;
      }
    })
  })
</script>