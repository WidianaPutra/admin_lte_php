<?php
include '../db/db.php';
include '../partial/header.php';

if (isset($_GET['kode'])) {
  $code = $_GET['kode'];
}

$datas = querytoDb("SELECT * FROM siswa WHERE kelas = '$code'");
?>

<!-- Pop up -->
<!-- Popup Form -->
<div id="popupForm" class="popup-container">
  <div class="popup-content">
    <h3>Tambahkan Poin Pelanggaran</h3>
    <form id="addPoinForm" method="POST">
      <input type="hidden" id="nis" name="nis">
      <div class="form-group">
        <label for="bobot">Bobot Pelanggaran:</label>
        <input type="number" id="bobot" name="bobot" min="1" required>
      </div>
      <button type="submit">Simpan</button>
      <button type="button" id="closePopup">Tutup</button>
    </form>
  </div>
</div>

<div class="container">
  <button class="backBtn">Kembali</button>
  <h2 class="table-title">Data Pelanggaran Siswa</h2>
  <table class="custom-table">
    <thead>
      <tr>
        <th>No.</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Poin Pelanggaran</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($datas as $i => $data): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $data['nis'] ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['poin'] === null ? 0 : $data['poin'] ?></td>
          <td class="btn-tambah-poin" style="cursor: pointer;" data-nis="<?= $data['nis'] ?>">Tambahkan</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<style>
  /* Styles for Popup */
  .popup-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 9999;
    animation: fadeIn 0.3s ease-in-out;
  }

  .popup-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .popup-content h3 {
    margin-bottom: 20px;
  }

  .popup-content .form-group {
    margin-bottom: 15px;
  }

  .popup-content label {
    display: block;
    margin-bottom: 5px;
  }

  .popup-content input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .popup-content button {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
  }

  .popup-content button[type="button"] {
    background-color: #dc3545;
    margin-top: 10px;
  }

  .popup-content button:hover {
    background-color: #0056b3;
  }

  .popup-content button[type="button"]:hover {
    background-color: #c82333;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  .backBtn {
    position: absolute;
    top: 10px;
    font-size: 20px;
    background: none;
    border: none;
    cursor: pointer;
  }

  .backBtn:hover {
    text-decoration: underline;
  }

  .container {
    width: 80%;
    margin: 0 auto;
    font-family: Arial, sans-serif;
  }

  .table-title {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-top: 10px;
  }

  .custom-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 16px;
    text-align: left;
    border: 1px solid #ddd;
  }

  .custom-table thead tr {
    background-color: #f4f4f4;
    color: #333;
  }

  .custom-table th {
    padding: 12px;
    border: 1px solid #ddd;
  }

  .custom-table td {
    padding: 10px;
    border: 1px solid #ddd;
  }

  .custom-table tr:hover {
    background-color: #f9f9f9;
  }
</style>

<script>
  document.querySelector("button.backBtn").addEventListener("click", () => {
    history.back();
  });

  document.querySelectorAll(".btn-tambah-poin").forEach(btn => {
    btn.addEventListener("click", (e) => {
      // Get the NIS of the clicked student
      const nis = e.target.getAttribute("data-nis");
      document.getElementById("nis").value = nis; // Set the NIS value in the hidden input
      // Show the popup
      document.querySelector(".popup-container").style.display = "flex";
    });
  });

  // Close the popup
  document.getElementById("closePopup").addEventListener("click", () => {
    document.querySelector(".popup-container").style.display = "none";
  });

  // Handle form submission
  document.getElementById("addPoinForm").addEventListener("submit", (e) => {
    e.preventDefault(); // Prevent form from submitting normally

    document.querySelector(".popup-container").style.display = "none";
  });
</script>