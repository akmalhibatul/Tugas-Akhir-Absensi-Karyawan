<?php
include("../koneksi.php");

$id = $_POST['id'];
$jadwal_id = $_POST['jadwal_id'];
$tanggal = $_POST['tanggal'];

$query  = mysqli_query($koneksi, "UPDATE `rekap` SET `tanggal`='$tanggal', `jadwal_id`='$jadwal_id' WHERE id='$id'");

header("location:data_jadwal.php");
