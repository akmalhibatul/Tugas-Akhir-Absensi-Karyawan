<?php
include("../koneksi.php");
$kode_karyawan = $_POST['kode_karyawan'];
$jadwal_id = $_POST['jadwal_id'];
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];


$tanggal_awal = explode('-', $_POST['dari']);
$tanggal_akhir = explode('-', $_POST['sampai']);

for ($i = $tanggal_awal[2]; $i <= $tanggal_akhir[2]; $i++) {
    $query = mysqli_query($koneksi, "INSERT INTO rekap SET kode_karyawan='$_POST[kode_karyawan]', jadwal_id='$_POST[jadwal_id]', tanggal='$tanggal_awal[0]-$tanggal_awal[1]-$i' ");
}

if ($query) {
    header("location:data_jadwal.php?msg=2");
} else {
    header("location:data_jadwal.php?msg=1");
}
