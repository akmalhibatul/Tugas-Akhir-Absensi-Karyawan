<?php
include("../koneksi.php");
$id = $_GET['id'];
$status = "tolak";

$query  = mysqli_query($koneksi, "UPDATE `tb_permission` SET `status_iz`='$status' WHERE id='$id'");
header("location:data_permission.php");
