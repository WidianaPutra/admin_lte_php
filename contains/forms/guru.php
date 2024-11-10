<?php
$data_kelas = querytoDb("SELECT * FROM kelas");

if (isset($_POST['submit'])) {
  $kode_guru = $_POST['kode_guru'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jenisKelamin = $_POST['jenisKelamin'];
  $email = $_POST['email'];
  $noTlp = $_POST['noTlp'];
  $kelas = $_POST['kelas'];

  $sql = "SELECT * FROM guru WHERE code_guru = '$kode_guru' AND email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows === 0) {
    $sql = "INSERT INTO guru (id, code_guru, nama, alamat, JK, email, telepon, kelas)
    VALUES ('','$kode_guru','$nama','$alamat','$jenisKelamin','$email','$noTlp','$kelas')";

    $result = $conn->query($sql);
    if ($result) {
      showAlert("Sukses", "Data tersimpan", "success");
    }
  } else {
    showAlert("Error", "Data sudah ada", "error");
  }
}
?>

<div class="content-wrapper px-2">
  <div class="container mt-3 mb-3">
    <h2 class="mb-4">Form Data Guru</h2>
    <form method="POST">
      <!-- NIS -->
      <div class="mb-3">
        <label for="kode_guru" class="form-label">Kode guru</label>
        <input type="text" class="form-control" id="kode_guru" name="kode_guru" placeholder="Masukkan kode guru"
          required">
      </div>
      <!-- Nama -->
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required">
      </div>
      <!-- Alamat -->
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat"
          required></textarea>
      </div>
      <!-- Jenis Kelamin -->
      <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenisKelamin" id="lakiLaki" value="Laki-laki" required>
            <label class="form-check-label" for="lakiLaki">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenisKelamin" id="perempuan" value="Perempuan" required>
            <label class="form-check-label" for="perempuan">Perempuan</label>
          </div>
        </div>
      </div>
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required ">
      </div>
      <!-- No Telp -->
      <div class=" mb-3">
        <label for="noTlp" class="form-label">No TLP</label>
        <input type="tel" class="form-control" id="noTlp" name="noTlp" placeholder="Masukkan No Telepon" required ">
     </div>

      <!-- Kelas -->
      <div class=" mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <select class="form-select" id="kelas" name="kelas" required>
          <?php
          foreach ($data_kelas as $kelas): ?>
            <option value="<?= $kelas['kode_kelas'] ?>"><?= $kelas['kelas'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</div>