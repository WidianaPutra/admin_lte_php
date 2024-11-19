<?php
$data_kelas = querytoDb("SELECT * FROM kelas");
?>

<div class="content-wrapper w-full" style="background-color: #D1D5DB;">
  <div class="d-flex align-items-center pt-3" style="flex-direction: column; gap: 10px;">
    <?php foreach ($data_kelas as $data): ?>
      <div class="list-kelas" data-code="<?= $data['kode_kelas'] ?>">
        <h1><?= $data['kelas']; ?></h1>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<style>
  .list-kelas {
    width: 80%;
    height: 70px;
    background-color: white;
    border-radius: 5px;
    display: flex;
    align-items: center;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    cursor: pointer;
  }

  .list-kelas>h1 {
    font-size: 20px;
    padding-left: 10px;
  }
</style>

<script>
  // $(".list-kelas").each((data, i) => {
  $(".list-kelas").click(function () {
    let kode_kelas = $(this).attr("data-code");
    window.location.href = `./pelanggaran?kode=${kode_kelas}`;
  })
  // })
</script>