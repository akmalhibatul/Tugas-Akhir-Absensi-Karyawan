<?php
require("template/header.php");
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-sticky-note mr-3">
                    </i>
                </div>

                <p>
                    Data Permisson <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>
        </div>
        <div class="conten">
            <a href="tambah.php" class="btn btn-primary" style="margin: 15px 15px 25px 0;">Tambah Permission</a>
            <a href="data_user.php" class="btn btn-primary" style="margin: 15px 0 25px 0;">Lihat Data User</a>
            <?php
            include("../indo_format.php");
            $sql = "SELECT * FROM tb_permission INNER JOIN tb_karyawan ON tb_permission.kode_karyawan = tb_karyawan.kode_karyawan WHERE status_iz = 'menunggu' ORDER BY id";
            $result = $koneksi->query($sql);
            if ($result->num_rows > 0) {
                $nomer = 0;
                echo "<div class='table-responsive'>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'># </th>
                <th scope='col'>Nama Lengkap</th>
                <th scope='col'>Memohon</th>
                <th scope='col'>Dari Tanggal</th>
                <th scope='col'>Sampai Tanggal</th>
                <th scope='col'>Keterangan</th>
                <th scope='col'>Status</th>
                <th scope='col'>Aksi</th>
            </tr>
        </thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    $nomer++;
                    $id = $row['id'];
                    $nama = $row['nama_karyawan'];
                    $izin = $row['izin'];
                    $dari = format_hari_tanggal($row['dari']);
                    $sampai = format_hari_tanggal($row['sampai']);
                    $keterangan = $row["keterangan"];
                    $status = $row["status_iz"];
                    echo "<tr>
                                        <td>$nomer</td>
                                        <td>$nama</td>
                                        <td>";
                    if ($row['izin'] == 'Sakit') {
                        echo "<div class='mb-2 mr-2 badge badge-warning'>Sakit</div>";
                    } elseif ($row['izin'] == 'Dinas') {
                        echo "<div class='mb-2 mr-2 badge badge-success'>Dinas</div>";
                    } elseif ($row['izin'] == 'Cuti') {
                        echo "<div class='mb-2 mr-2 badge badge-info'>Cuti</div>";
                    } else {
                        echo "<div class='mb-2 mr-2 badge badge-danger'>$izin</div>";
                    };
                    echo "</td>
        <td>$dari</td>
        <td>$sampai</td>
        <td>$keterangan</td>
        <td><b>$status<b></td>
        <td>
        <a href='acc_form.php?id=$id' class='btn btn-primary'>Konfirmasi</a>
        <a href='tolak.php?id=$id' class='btn btn-danger'>Tolak</a>
        </td>
        </tr></tbody>";
                }
                echo "</table></div><br><br><br>";
            } else {
                echo "
    <div class='table-responsive'>
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'># </th>
                    <th scope='col'>Nama Lengkap</th>
                    <th scope='col'>Memohon</th>
                    <th scope='col'>Dari Tanggal</th>
                    <th scope='col'>Sampai Tanggal</th>
                    <th scope='col'>Keterangan</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Aksi</th>
                </tr>
            </thead>
                <tbody>
                <td colspan='8'><div class='alert alert-warning'><strong>Tidak Ada request izin.</strong></div></td>
                </tbody>
        </table>
    </div>
    ";
            }
            ?> </div>
    </div>
</div> <?php
        require("template/bawah.php");
        ?>