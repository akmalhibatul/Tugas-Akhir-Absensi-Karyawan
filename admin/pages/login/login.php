<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login | Tegal Rotan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="../gambar/lingkaran.png">
  <link rel="stylesheet" type="text/css" href="admin/css/icon/css/all.min.css" />
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>
<style>
  input {
    font-weight: bold;
  }
</style>

<body>
  <div class="kotak_login">
    <p class="tulisan_login">
      <img src="../gambar/persegi panjang.png" width="60%" />
    </p>
    <?php
    if ($_GET['msg'] == 1 && $_SERVER['HTTP_REFERER']) {
    ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Username dan Password Tidak Boleh Kosong !!!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    } else if ($_GET['msg'] == 2 && $_SERVER['HTTP_REFERER']) {
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Username atau Password Salah !!!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    } else if ($_GET['msg'] == 3 && $_SERVER['HTTP_REFERER']) {
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Tidak Boleh Kosong !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    }
    ?>
    <form method="POST" action="proseslogin.php">
      <label>Username</label>
      <input type="text" name="username" class="form_login" />

      <label>Password</label>
      <input type="password" name="password" class="form_login" />

      <input type="submit" class="tombol_login" value="LOGIN" />
      <input type="reset" class="reset_login" value="RESET" />
    </form>
  </div>
</body>
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>