<?php
error_reporting(0);
session_start();
require_once("koneksi.php");
if ($_SESSION['level'] != "admin") {
    header('Location: ../../index.php');
    exit();
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM `tb_login` WHERE `username` = '$username'";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
    $nama = $row['nama'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin | Absensi Tegal Rotan</title>

    <link rel="icon" href="gambar/lingkaran.png">
    <link rel="stylesheet" type="text/css" href="../css/icon/css/all.min.css" />
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/style_admin.css" rel="stylesheet" />

</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <img src="gambar/lingkaran.png" width="50"> Tegal Rotan
            </div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-tachometer-alt mr-3"></span>Dasboard</a>
                <a href="masterdata/data_karyawan.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-id-card mr-3"></span>Data karyawan</a>
                <a href="absen/rekap_absen.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-book mr-3"></span>Absen</a>
                <a href="izin/data_permission.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-sticky-note mr-3"></span>Permisson</a>
                <a href="jadwal/data_jadwal.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-calendar-alt mr-3"></span>Jadwal Kerja</a>
                <a href="login/logout.php" class="list-group-item list-group-item-action" id="link"><span class="fas fa-sign-out-alt mr-3"></span>Logout</a>
            </div>
        </div>


        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <button class="btn a" id="menu-toggle">
                    <i class="fas fa-align-justify"></i>
                </button>
                <img src="gambar/persegi panjang.png" width="140">
            </nav>