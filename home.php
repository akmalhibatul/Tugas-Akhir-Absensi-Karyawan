<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Absen | Tegal Rotan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="admin/pages/gambar/lingkaran.png">
    <link rel="stylesheet" type="text/css" href="admin/css/icon/css/all.min.css" />
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap");

    body {
        background: #62d8a2;
        font-family: "Quicksand", sans-serif;
        font-weight: bold;
    }

    .tulisan_login {
        text-align: center;
    }

    .kotak_login {
        width: 700px;
        background: white;
        /*meletakkan form ke tengah*/
        margin: 180px auto;
        padding: 30px 20px;
        box-shadow: 4px 8px 8px 4px rgba(2, 2, 0, 0.2);
    }

    .form_login {
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        font-size: 11pt;
        margin-bottom: 20px;
        margin-top: 2px;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .kotak_login {
            width: 350px;
        }
    }
</style>

<body>
    <div class="kotak_login">
        <?php
        if ($_GET['msg'] == 1 && $_SERVER['HTTP_REFERER']) {
        ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="alert-heading font-w300 my-2">Kode Tidak Terdaftar!</h3>
            </div>
        <?php
        } else if ($_GET['msg'] == 2 && $_SERVER['HTTP_REFERER']) {
        ?>
            <div class="alert alert-warning alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="alert-heading font-w300 my-2">Karyawan Sudah Pulang</h3>
            </div>
        <?php
        } else if ($_GET['msg'] == 3 && $_SERVER['HTTP_REFERER']) {
        ?>
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="alert-heading font-w300 my-2">Berhasil Absen Pulang</h3>
            </div>
        <?php
        } else if ($_GET['msg'] == 4 && $_SERVER['HTTP_REFERER']) {
        ?>
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="alert-heading font-w300 my-2">Berhasil Absen Masuk</h3>
            </div>
        <?php
        } else if ($_GET['msg'] == 5 && $_SERVER['HTTP_REFERER']) {
        ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="alert-heading font-w300 my-2">Belum ada Jadwal</h3>
            </div>
        <?php
        }
        ?>
        <p class="tulisan_login">
            <img src="admin/pages/gambar/persegi panjang.png" width="50%" />
        </p>

        <form action="absen_post.php" method="POST">
            <input type="number" placeholder="Masukan Nomer Karyawan" name="kode_karyawan" class="form_login" />
            <button class="btn btn-primary" type="submit" style="border-radius:0">
                <span class="fas fa-check"></span>
            </button>

            <button class="btn btn-danger" type="reset" style="border-radius:0">
                <span class="fas fa-redo-alt"></span>
            </button>
            <a href="admin/pages/login/login.php" class="btn btn-primary" title="Login" style="float:right; border-radius:0">
                <span class="fas fa-user-alt"></span>
            </a>
        </form>
    </div>
</body>
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>