<?php
include("../koneksi.php");
$target_dir = "../gambar/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $kode_karyawan = $_POST['kode_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jabatan = $_POST['jabatan'];
    $agama_karyawan = $_POST['agama_karyawan'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tlp_karyawan = $_POST['tlp_karyawan'];
    $alamat_karyawan = $_POST['alamat_karyawan'];
    $foto = $_FILES['foto'];
    $level = $_POST['level'];


    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        echo "File gambar - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Maaf File sudah ada.";
    $uploadOk = 0;
}

if ($_FILES["foto"]["size"] > 2000000) {
    echo "Maaf ukuran File Terlalu Besar.";
    $uploadOk = 0;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Maaf, Format Foto hanya JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Gagal Upload Foto.";
} else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        $namafile = basename($_FILES["foto"]["name"]);
        echo "The file " . $namafile . " has been uploaded.";

        $query = "insert into tb_karyawan value(NULL, '$kode_karyawan','$nama_karyawan', '$jenis_kelamin', '$jabatan',
        '$agama_karyawan','$tanggal_lahir','$tlp_karyawan','$alamat_karyawan', '$namafile')";

        $query2 = "insert into tb_login value(NULL, '$kode_karyawan','$kode_karyawan','$level','$nama_karyawan','$kode_karyawan')";


        $query = mysqli_query($koneksi, $query);
        $query2 = mysqli_query($koneksi, $query2);
        if ($query) {
            header("location:data_karyawan.php?msg=1");
        } else {
            header("location:data_karyawan.php?msg=2");
            echo mysqli_error($koneksi);
        }
    } else {
        header("location:data_karyawan.php?msg=1");
    }
}
