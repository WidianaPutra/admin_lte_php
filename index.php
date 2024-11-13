<?php
// include "./authentication/auth.php"; // authentication code
// include "./authentication.php"; // login and register route
include "./db/db.php";
include("./partial/header.php");

if (isset($_COOKIE['account_id']) && isset($_COOKIE['username'])) {

}
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include("./partial/navbar.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("./partial/sidebar.php") ?>
    <!-- /Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <?php
    if (isset($_GET['dashboard'])) {
      include("./contains/dashboard.php");
    } elseif (isset($_GET['form'])) {
      include("./contains/form.php");
    } elseif (isset($_GET['table'])) {
      include("./contains/tables.php");
    } elseif (isset($_GET['edit'])) {
      include("./contains/edit.php");
    } else {
      include("./contains/dashboard.php");
    }

    ?>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php include("./partial/footer.php") ?>

    <!-- /footer -->
  </div>

  <!-- jQuery -->
  <?php include("./partial/scripts.php") ?>
</body>

</html>