<?php
require_once("template/header.php");
?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-sticky-note mr-3">
                    </i>
                </div>

                <p>
                    Data Permission <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>
        </div>

        <div class="conten">
            <?php
            date_default_timezone_set("Asia/Jakarta");
            require_once("../koneksi.php");
            include '../indo_format.php';
            $bulan = 12;
            $tahun = date('Y');
            $bulanKosong = 0;
            for ($i = 1; $i <= $bulan; $i++) {
                switch (date($i)) {
                    case '1':
                        $bulan_ini = "Januari";
                        break;

                    case '2':
                        $bulan_ini = "Febuari";
                        break;

                    case '3':
                        $bulan_ini = "Maret";
                        break;

                    case '4':
                        $bulan_ini = "April";
                        break;

                    case '5':
                        $bulan_ini = "Mei";
                        break;

                    case '6':
                        $bulan_ini = "Juni";
                        break;

                    case '7':
                        $bulan_ini = "Juli";
                        break;

                    case '8':
                        $bulan_ini = "Agustus";
                        break;

                    case '9':
                        $bulan_ini = "September";
                        break;

                    case '10':
                        $bulan_ini = "Oktober";
                        break;

                    case '11':
                        $bulan_ini = "November";
                        break;

                    case '12':
                        $bulan_ini = "Desember";
                        break;

                    default:
                        $bulan_ini = "Tidak di ketahui";
                        break;
                }
                $kode_karyawan = $_GET['kode_karyawan'];
                $sql = "SELECT * FROM `tb_permission` WHERE `kode_karyawan` = $kode_karyawan AND MONTH(dari) = $i AND YEAR(dari) = $tahun";
                $result = $koneksi->query($sql);
                if ($result->num_rows > 0) {
                    $noUrut = 0;
                    echo "<h3 class='sub-header'>Permission - <b>$bulan_ini</b> </h3><br>";
                    echo "<div class='table-responsive'>
			           <table class='table table-striped'>
			            <thead>
			               <tr>
                           <th scope='col'>No</th>
                           <th scope='col'>Memohon</th>
                           <th scope='col'>Dari Tanggal</th>
                           <th scope='col'>Sampai Tanggal</th>
                           <th scope='col'>Keterangan</th>
                           <th scope='col'>Status</th>
			               </tr>
			            </thead>
			            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        $noUrut++;
                        $izin = $row["izin"];
                        $dari = format_hari_tanggal($row['dari']);
                        $sampai = format_hari_tanggal($row['sampai']);
                        $keterangan = $row["keterangan"];
                        $status = $row['status_iz'];
                        echo "<tr>
                                        <td>$noUrut</td>
                                        <td>$izin</td>
                                        <td>$dari</td>
                                        <td>$sampai</td>
                                        <td>$keterangan</td>
                                        <td>";
                        if ($row['status_iz'] == 'konfirmasi') {
                            echo " <div class='mb-2 mr-2 badge badge-success'>Konfirmasi</div>";
                        } elseif ($row['status_iz'] == 'menunggu') {
                            echo "<div class='mb-2 mr-2 badge badge-warning'>Menunggu</div>";
                        } else {
                            echo "<div class='mb-2 mr-2 badge badge-danger'>$status</div>";
                        };
                        echo "</td></tr></tbody>";
                    }
                    echo "</table></div><br><br><br>";
                } else {
                    $bulanKosong++;
                }
            }
            if ($bulanKosong == 12) {
                echo "<div class='alert alert-warning'><strong>Tidak ada Izin untuk ditampilkan.</strong></div>";
            }
            ?>
        </div>
    </div>
</div>
</div>
<?php
require_once("template/bawah.php");
?>


<!-- echo "<div class='alert alert-warning'><strong>Tidak ada Absensi untuk ditampilkan.</strong></div>"; -->