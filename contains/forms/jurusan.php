<?php
if (isset($_POST['submit'])) {
  $nama = $_POST["nama_jurusan"];
  $kode_jurusan = $_POST["kode_jurusan"];
  $singkatan = $_POST['singkatan'];

  $sql = "SELECT * FROM kejuruan WHERE code = '$kode_jurusan'";
  $result = $conn->query($sql);

  if ($result->num_rows === 0) {
    $sql = "INSERT INTO kejuruan (id, singkatan, nama, code) 
    VALUES ('','$singkatan','$nama','$kode_jurusan')";

    $result = $conn->query($sql);

    if ($result) {
      showAlert("Sukses", "Data tersimpan", "succes");
    }
  } else {
    showAlert("Error", "Data sudah ada", "error");
  }
}
?>
<div class="content-wrapper px-2">
  <div class="container mt-3 mb-3">
    <h2 class="mb-4">Form Jurusan</h2>
    <form method="POST">
      <!-- NIS -->
      <div class="mb-3">
        <label for="jurusan" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" id="jurusan" name="nama_jurusan" placeholder="Masukkan Nama Jurusan"
          required">
      </div>
      <!-- Nama -->
      <div class="mb-3">
        <label for="kode" class="form-label">Kode Jurusan</label>
        <input type="text" class="form-control" id="kode" name="kode_jurusan" placeholder="Masukkan kode kelas"
          required">
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