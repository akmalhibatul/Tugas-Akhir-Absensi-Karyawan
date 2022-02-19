<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$id = $_POST['id'];
$kode_karyawan = $_POST['pemohon'];
$izin = $_POST['izin'];
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
$keterangan = $_POST['keterangan'];
$jam = date('H:i:s');
$status = "konfirmasi";

$status  = mysqli_query($koneksi, "UPDATE `tb_permission` SET `status_iz`='$status' WHERE id='$id'");

$tanggal_awal = explode('-', $_POST['dari']);
$tanggal_akhir = explode('-', $_POST['sampai']);

for ($i = $tanggal_awal[2]; $i <= $tanggal_akhir[2]; $i++) {
    $sql = "SELECT * FROM rekap WHERE tanggal='$tanggal_awal[0]-$tanggal_awal[1]-$i' AND kode_karyawan='$_POST[pemohon]'";
    $query = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($query) > 0) {
        mysqli_query($koneksi, "UPDATE rekap SET status = '$izin' , jam_datang='$jam', jam_pulang='$jam' WHERE tanggal='$tanggal_awal[0]-$tanggal_awal[1]-$i' AND kode_karyawan='$_POST[pemohon]'");
    } else {
        mysqli_query($koneksi, "INSERT INTO rekap SET kode_karyawan='$_POST[pemohon]', status='$_POST[izin]', tanggal='$tanggal_awal[0]-$tanggal_awal[1]-$i', jam_datang='$jam', jam_pulang='$jam' ");
    }
}

echo "<script>window.location='data_permission.php'</script>";
