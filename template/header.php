<?php
error_reporting(0);
session_start();
require_once("koneksi.php");
if (!$_SESSION['username']) {
    header('Location:home.php');
    exit();
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM `tb_login` WHERE `username` = '$username' ";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
    $nama = $row['nama'];
    $kode_karyawan = $row['kode_karyawan'];
}
?>

<?php
$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan ORDER BY id_karyawan");
while ($d = mysqli_fetch_array($sql));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Absensi Tegal Rotan</title>

    <link rel="icon" href="admin/pages/gambar/lingkaran.png">
    <link rel="stylesheet" type="text/css" href="admin/css/icon/css/all.min.css" />

    <!-- Bootstrap core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="admin/vendor/dataTables.bootstrap4.min.css">

    <!-- Custom styles for this template -->
    <link href="admin/css/style_admin.css" rel="stylesheet" />

</head>
<style>
    #footer {
        bottom: 0;
        position: fixed;
        width: 100%;
        height: 40px;
        border-radius: 0.25rem;
        background-color: white;
    }

    .imgprofile {
        margin-top: 25px;
        border-radius: 50%;
        width: 200px;
        margin-bottom: 20px;
    }

    .btn {
        float: left;
        margin-right: 5px;
        margin-bottom: 0px;
    }

    .kotak {
        width: 1000px;
    }


    #menu-toggle .btn {
        float: left;
        margin-right: 5px;
    }


    @media (max-width: 750px) {
        .kotak {
            width: 360px;
            margin-bottom: 150px;
        }
    }
</style>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <img src="admin/pages/gambar/lingkaran.png" width="50"> Tegal Rotan
            </div>
            <div class="list-group list-group-flush">
                <a href="profile.php?kode_karyawan=<?php echo $username; ?>" class="list-group-item list-group-item-action" id="link"><span class="fas fa-users mr-3"></span>Profile</a>
                <a href="index.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-tachometer-alt mr-3"></span>Dashboard</a>
                <a href="absen.php?kode_karyawan=<?php echo $username; ?>" class="list-group-item list-group-item-action" id="link"><span class="fas fa-book mr-3"></span>Absen ku</a>
                <a href="data_permission.php?kode_karyawan=<?php echo $username; ?>" class="list-group-item list-group-item-action" id="link"><span class="fas fa-sticky-note mr-3"></span>izin</a>
                <a href="jadwal.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-calendar-alt mr-3"></span>Jadwal Kerja</a>
                <a href="admin/pages/login/logout.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-sign-out-alt mr-3"></span>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->