<?php
if (isset($_POST['submit'])) {
  $nama_kelas = $_POST['nama_kelas'];
  $kode_kelas = $_POST['kode'];
  $singkatan_kelas = $_POST['kode'];

  if (!(empty($nama_kelas) && empty($kode_kelas) && empty($singkatan_kelas))) {
    $sql = "SELECT * FROM kelas WHERE kode_kelas = '$kode_kelas'";
    $result = $conn->query($sql);
    if ($result->num_rows === 0) {

      $sql = "INSERT INTO kelas (id, kelas, kode_kelas, singkatan)
       VALUES ('', '$nama_kelas','$kode_kelas','$singkatan_kelas')";
      $result = $conn->query($sql);

      if ($result) {
        showAlert("Sukses", "Data tersimpan", "success");
      }
    } else {
      showAlert("error", "Data sudah ada", 'error');
    }
  } else {
    showAlert("error", "Data kosong, harap diisi", 'error');
  }
}
?>

<div class="content-wrapper px-2">
  <div class="container mt-3 mb-3">
    <h2 class="mb-4">Form Data Siswa</h2>
    <form method="POST">
      <!-- NIS -->
      <div class="mb-3">
        <label for="nama_kelas" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" id="Nnama_Kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas"
          required">
      </div>
      <!-- Nama -->
      <div class="mb-3">
        <label for="kode" class="form-label">Kode kelas</label>
        <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan kode kelas" required">
      </div>
      <!-- Email -->
      <div class="mb-3">
        <label for="singkatan" class="form-label">Masukan Singkatan</label>
        <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="Masukkan singkatan kelas"
          required ">
      </div>
      <button type=" submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</div>