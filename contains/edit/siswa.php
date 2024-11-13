<?php
if (!isset($_GET['key'])) {
  header("Location: " . $_SERVER['HTTP_REFERER']);
}
$nis = $_GET['key'];
$data_kelas = querytoDb("SELECT * FROM kelas");
$data_siswa = querytoDb("SELECT * FROM siswa LEFT JOIN kelas ON siswa.kelas = kelas.kode_kelas WHERE nis='$nis'");

$r = $data_siswa[0]['JK'] === "Laki-Laki";

if (isset($_POST['submit'])) {
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jenisKelamin = $_POST['jenisKelamin'];
  $email = $_POST['email'];
  $noTlp = $_POST['noTlp'];
  $kelas = $_POST['kelas'];

  if (!(empty($nis) && empty($nama) && empty($alamat) && empty($jenisKelamin) && empty($email) && empty($noTlp) && empty($kelas))) {
    $sql = "UPDATE siswa SET nama='$nama', alamat='$alamat', JK='$jenisKelamin', email='$email', telepon='$noTlp', kelas='$kelas' WHERE nis='$nis'";
    $result = $conn->query($sql);

    var_dump($result);

  } else {
    echo "<script>swl.fire({title: 'Error', text: 'Form tidak boleh kosong', icon: 'error'})</script>";
  }
}
?>
<div class="content-wrapper px-2">
  <div class="container mt-3 mb-3">
    <h2 class="mb-4">Edit Form Data Siswa</h2>
    <form method="POST">
      <!-- NIS -->
      <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required
          value="<?= $data_siswa[0]['nis'] ?>" ">
      </div>
      <!-- Nama -->
      <div class=" mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required
          value="<?= $data_siswa[0]['nama'] ?>"">
      </div>
      <!-- Alamat -->
      <div class=" mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat"
          required><?= htmlspecialchars($data_siswa[0]['alamat']) ?></textarea>
      </div>
      <!-- Jenis Kelamin -->
      <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenisKelamin" id="lakiLaki" value="Laki-laki" required
              <?= $data_siswa[0]['JK'] == "Laki-laki" ? "checked" : "" ?>>
            <label class="form-check-label" for="lakiLaki">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenisKelamin" id="perempuan" value="Perempuan" required
              <?= $data_siswa[0]['JK'] == "perempuan" ? "checked" : "" ?>>
            <label class="form-check-label" for="perempuan">Perempuan</label>
          </div>
        </div>
      </div>
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required value="
          <?= $data_siswa[0]['email'] ?>">
      </div>
      <!-- No Telp -->
      <div class=" mb-3">
        <label for="noTlp" class="form-label">No TLP</label>
        <input type="tel" class="form-control" id="noTlp" name="noTlp" placeholder="Masukkan No Telepon" required
          value="<?= $data_siswa[0]['telepon'] ?>">
      </div>

      <!-- Kelas -->
      <div class=" mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <select class="form-select" id="kelas" name="kelas" required>
          <?php
          foreach ($data_kelas as $kelas): ?>
            <option value="<?= $kelas['kode_kelas'] ?>" <?= $kelas['kode_kelas'] == $data_kelas[0]['kode_kelas'] ? "selected" : "" ?>><?= $kelas['kelas'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</div>