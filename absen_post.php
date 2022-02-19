<?php
date_default_timezone_set("Asia/Jakarta");
require_once("./koneksi.php");
if (isset($_POST['kode_karyawan'])  && $_SERVER['HTTP_REFERER']) {
    $kode_karyawan = $_POST['kode_karyawan'];

    $sql = "SELECT * FROM `tb_karyawan` WHERE `kode_karyawan` = $kode_karyawan";
    $result = $koneksi->query($sql);
    if ($result->num_rows < 1) {
        // Kode tidak terdaftar
        header("location:./home.php?msg=1");
        exit();
    }
    $sql = "SELECT * FROM `rekap` WHERE `kode_karyawan` = '$kode_karyawan' AND DATE(`tanggal`) = CURDATE()";
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_jadwal = $row['jadwal_id'];
            $jam_datang = $row['jam_datang'];
            $jam_pulang = $row['jam_pulang'];
        }

        if ($jam_datang == NULL && $jam_pulang == NULL) {
            // Absen masuk
            $sql = "SELECT * FROM `jadwal` WHERE `id` = '$id_jadwal'";
            $result = $koneksi->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jam_masuk = $row["jam_masuk"];
                    $jam_pulang = $row["jam_keluar"];
                }
                $jam = date("H:i:s");
                if ($id_jadwal == 3) {
                    $status = "Tidak Terlambat";
                } else {
                    if ($jam >= $jam_masuk) {
                        $status = "Terlambat";
                    } else {
                        $status = "Tidak Terlambat";
                    }
                }
                $sql = "UPDATE `rekap` SET `jam_datang`= '$jam', `status` = '$status' WHERE `kode_karyawan` = '$kode_karyawan' AND DATE(`tanggal`) = CURDATE()";
                $result = $koneksi->query($sql);
                header("location:./home.php?msg=4");
                exit();
            } else {
                header("location:./home.php?msg=2");
                exit();
            }
        } else if ($jam_datang != NULL && $jam_pulang == NULL) {
            // Absen Pulang
            $sql = "SELECT * FROM `jadwal` WHERE `id` = '$id_jadwal'";
            $result = $koneksi->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jam_masuk = $row["jam_masuk"];
                    $jam_pulang = $row["jam_keluar"];
                }
                $jam = date("H:i:s");
                if ($id_jadwal == 3) {
                    $status = "Pulang";
                } else {
                    if ($jam >= $jam_masuk) {
                        $status = "Terlambat";
                    } else {
                        $status = "Pulang";
                    }
                }
                $sql = "UPDATE `rekap` SET `jam_pulang`= '$jam', `status` = '$status' WHERE `kode_karyawan` = '$kode_karyawan' AND DATE(`tanggal`) = CURDATE()";
                $result = $koneksi->query($sql);
                header("location:./home.php?msg=3");
                exit();
            } else {
                // Jadwal tidak ditemukan #1
                header("location:./home.php?msg=2");
                exit();
            }
        } else {
            // Sudah absen masuk dan sudah absen keluar
            header("location:./home.php?msg=2");
            exit();
        }
    } else {
        // Jadwal tidak ditemukan #2
        header("location:./home.php?msg=5");
        exit();
    }
}
