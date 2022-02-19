<?php
session_start();

include('../koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi, "SELECT * from tb_login where username='$username' and password='$password'");

$cek = mysqli_num_rows($login);
if ($username == "" && $password == "" > 1) {
    header("location:login.php?msg=3");
} elseif ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "admin") {

        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location:../index.php?msg=2");
        //
    } else if ($data['level'] == "user") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "user";
        header("location:../../../index.php?msg=2");
    } else {

        header("location:login.php?msg=2");
    }
} else {
    header("location:login.php?msg=2");
}
