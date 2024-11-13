<?php
if (!isset($_GET['key'])) {
  header("Location: " . $_SERVER['HTTP_REFERER']);
}
$code_jurusan = $_GET['key'];
$data_jurusan = querytoDb("SELECT * FROM kejuruan WHERE code = '$code_jurusan'");

if (isset($_POST['submit'])) {
  $nama = $_POST["nama_jurusan"];
  $kode_jurusan = $_POST["kode_jurusan"];
  $singkatan = $_POST['singkatan'];

  $data_jurusan = querytoDb("SELECT * FROM kejuruan WHERE code = '$kode_jurusan'");

  $sql = "UPDATE kejuruan SET singkatan='$singkatan', nama='$nama',code='$kode_jurusan'";
  $result = $conn->query($sql);
  echo "<script>
    window.location.href = './?table=jurusan';
    </script>";
}
?>
<div class="content-wrapper px-2">
  <div class="container mt-3 mb-3">
    <h2 class="mb-4">Edit Jurusan</h2>
    <form method="POST">
      <!-- NIS -->
      <div class="mb-3">
        <label for="jurusan" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="nama_jurusan" placeholder="Masukkan Nama Jurusan"
          required" value="<?= $data_jurusan[0]['nama'] ?>">
      </div>
      <!-- Nama -->
      <div class="mb-3">
        <label for="kode" class="form-label">Kode Jurusan</label>
        <input type="text" class="form-control" id="kode" name="kode_jurusan" placeholder="Masukkan kode kelas"
          required" value="<?= $data_jurusan[0]['code'] ?>">
      </div>
      <!-- Email -->
      <div class=" mb-3">
        <label for="singkatan" class="form-label">Masukan Singkatan</label>
        <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="Masukkan singkatan kelas"
          required value="<?= $data_jurusan[0]['singkatan'] ?>">
      </div>
      <button type=" submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</div>