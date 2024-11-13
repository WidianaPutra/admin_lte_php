<?php
include("./data/sidebarData.php")
  ?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <span class="brand-text font-weight-light">Martinator School #89</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
      <div class="image">
        <img src="dist/img/th.jpg" alt="User Image"
          style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
      </div>
      <div class="info">
        <a href="#" class="d-block">Jorge Martin #89</a>
      </div>
    </div>

    <!-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php foreach ($datas as $data): ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="<?= $data['icon'] ?>"></i>
              <p>
                <?= $data['title'] ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php foreach ($data['data'] as $data): ?>
                <li class="nav-item">
                  <a href="<?= $data['link'] ?>" class="nav-link">
                    <p><?= $data['menu'] ?></p>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>