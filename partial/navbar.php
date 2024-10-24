<?php
include("./data/navbarData.php")
  ?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

    <?php foreach ($datas as $data): ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= $data['linkTo'] ?>" class="nav-link"><?= $data['title'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>