<?php
include("../koneksi.php");
$id = $_POST['id'];
$jam_masuk = $_POST['jam_masuk'];
$jam_keluar = $_POST['jam_keluar'];

$query  = mysqli_query($koneksi, "UPDATE `jadwal` SET `jam_masuk`='$jam_masuk',`jam_keluar`='$jam_keluar' WHERE id='$id'");
if ($query) {
    header("location:data_jadwal.php?msg=2");
} else {
    header("location:data_jadawal.php?msg=1");
}
