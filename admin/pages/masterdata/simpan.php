<?php

include '../koneksi.php';
$id_karyawan = $_POST['id_karyawan'];
$nama_karyawan = $_POST['nama_karyawan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jabatan = $_POST['jabatan'];
$agama_karyawan = $_POST['agama_karyawan'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$tlp_karyawan = $_POST['tlp_karyawan'];
$alamat_karyawan = $_POST['alamat_karyawan'];
$foto = $_FILES['foto'];
if ($foto['name'] != NULL) {
    $ekstensi_diperbolehkan = array('image/jpeg', 'image/jpg', 'image/png');
    $ekstensi = $foto['type'];
    $file_tmp = $foto['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto['name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../gambar/' . $nama_gambar_baru);
        $query  = mysqli_query($koneksi, "UPDATE `tb_karyawan` SET `nama_karyawan`='$nama_karyawan',`jenis_kelamin`='$jenis_kelamin',`jabatan`='$jabatan',`agama_karyawan`='$agama_karyawan', `tanggal_lahir`='$tanggal_lahir', `tlp_karyawan`='$tlp_karyawan',`alamat_karyawan`='$alamat_karyawan',`foto`='$nama_gambar_baru' WHERE id_karyawan='$id_karyawan'");

        if (!$query) {
            header("location:data_karyawan.php?msg=6");
        } else {

            header("location:data_karyawan.php?msg=5");
        }
    } else {
        echo mysqli_error($koneksi);
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, png atau jpeg.');window.location='data_karyawan.php';</script>";
    }
} else {
    $query  = mysqli_query($koneksi, "UPDATE `tb_karyawan` SET `nama_karyawan`='$nama_karyawan',`jenis_kelamin`='$jenis_kelamin',`jabatan`='$jabatan',`agama_karyawan`='$agama_karyawan', `tanggal_lahir`='$tanggal_lahir', `tlp_karyawan`='$tlp_karyawan',`alamat_karyawan`='$alamat_karyawan' WHERE id_karyawan='$id_karyawan'");

    if (!$query) {
        header("location:data_karyawan.php?msg=6");
    } else {

        header("location:data_karyawan.php?msg=5");
    }
}
