<?php
if (!isset($_GET['key'])) {
  header("Location: " . $_SERVER['HTTP_REFERER']);
}
$code_kelas = $_GET['key'];
$data_kelas = querytoDb("SELECT * FROM kelas WHERE kode_kelas = '$code_kelas'");

if (isset($_POST['submit'])) {
  $nama_kelas = $_POST['nama_kelas'];
  $kode_kelas = $_POST['kode'];
  $singkatan_kelas = $_POST['kode'];

  if (!(empty($nama_kelas) && empty($kode_kelas) && empty($singkatan_kelas))) {
    $sql = "SELECT * FROM kelas WHERE kode_kelas = '$kode_kelas'";
    $result = $conn->query($sql);
    $sql = "UPDATE kelas SET kelas='$nama_kelas', kode_kelas='$kode_kelas', singkatan='$singkatan_kelas' WHERE kode_kelas='$code_kelas'";
    $result = $conn->query($sql);

    echo "<script>
    window.location.href = './?table=kelas';
    </script>";
  } else {
    showAlert("error", "Data kosong, harap diisi", 'error');
  }
}
?>

<div class="content-wrapper px-2">
  <div class="container mt-3 mb-3">
    <h2 class="mb-4">Edit Data Kelas</h2>
    <form method="POST">
      <!-- NIS -->
      <div class="mb-3">
        <label for="nama_kelas" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" id="Nnama_Kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas"
          required value="<?= $data_kelas[0]['kelas'] ?>">
      </div>
      <!-- Nama -->
      <div class="mb-3">
        <label for="kode" class="form-label">Kode kelas</label>
        <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan kode kelas" required
          value="<?= $data_kelas[0]['kode_kelas'] ?>">
      </div>
      <!-- Email -->
      <div class=" mb-3">
        <label for="singkatan" class="form-label">Masukan Singkatan</label>
        <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="Masukkan singkatan kelas"
          required value="<?= $data_kelas[0]['singkatan'] ?>">
      </div>
      <button type=" submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</div>