<?php
include 'koneksi.php';
$kode_karyawan = $_POST['pemohon'];
$izin = $_POST['izin'];
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
$keterangan = $_POST['keterangan'];
$status = "menunggu";

$status = mysqli_query($koneksi, "INSERT INTO tb_permission value(NULL, '$kode_karyawan', '$izin', '$dari', '$sampai', '$keterangan','$status')");

if ($status) {
    header("location:data_permission.php?msg=1");
} else {
    header("location:data_permission.php?msg=2");
}
