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
  <form method="POST" class="mb-3">
    <label for="filter" <?= $filter === "" ? "selected" : "" ?>></label>
    <select name="filter" id="filter" onchange="this.form.submit();">
      <option value="all">Semua</option>
      <?php foreach ($data_kelas as $data): ?>
        <option value="<?php echo $data['kode_kelas']; ?>"><?php echo $data['kelas']; ?></option>
      <?php endforeach; ?>
    </select>
  </form>

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
              <button class="edit bg-success px-3 py-2 rounded" style="border: none;">
                <i class='fas fa-edit' style="color: #fff;" index="<?= $data['nis'] ?>"></i>
              </button>
              <p class="px-3 rounded">|</p>
              <button class="delete bg-danger px-3 py-2 rounded" style="border: none;" index="<?= $data['nis'] ?>">
                <i class='fas fa-trash-alt' style=" color: #fff;"></i>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    <?php endif ?>
  </table>
  <?php if (count($datas) === 0): ?>
    <h1 style="font-size: 20px; padding-left: 5px;">Data tidak ada</h1>
  <?php endif; ?>
</div>

<script>
  $("button.edit").click(function () {
    const parameter = $(this).attr('index');
  })

  $("button.delete").click(function () {
    const parameter = $(this).attr('index');
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
        window.location.href = `./delete.php?table=siswa&parameter=${parameter}&row=nis`;
      }
    })
  })
</script>