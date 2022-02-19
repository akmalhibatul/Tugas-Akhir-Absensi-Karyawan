<?php
include("../koneksi.php");
$kode_karyawan = $_GET['kode_karyawan'];

mysqli_query($koneksi, "DELETE FROM tb_login WHERE kode_karyawan='$kode_karyawan'");
$query = mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE kode_karyawan='$kode_karyawan'");

if ($query) {
    header("location:data_karyawan.php?msg=3");
} else {
    header("location:data_karyawan.php?msg=4");
}
