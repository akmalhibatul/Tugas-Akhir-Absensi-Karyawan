<?php
require_once("template/header.php");
?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn a" id="menu-toggle">
            <i class="fas fa-align-justify"></i>
        </button>
        <img src="admin/pages/gambar/persegi panjang.png" width="140">
    </nav>

    <div class="container-fluid">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-book mr-3">
                    </i>
                </div>

                <p>
                    Absensi ku <div class="page-title-subheading">Selamat Datang <b><?php echo $nama; ?></b> di Aplikasi Absensi
                </p>

            </div>
        </div>

        <div class="conten">
            <?php
            date_default_timezone_set("Asia/Jakarta");
            require_once("./koneksi.php");
            include 'indo_format.php';
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
                $sql = "SELECT * FROM `rekap` WHERE `kode_karyawan` = $username AND MONTH(tanggal) = $i AND YEAR(tanggal) = $tahun";
                $result = $koneksi->query($sql);
                if ($result->num_rows > 0) {
                    $noUrut = 0;
                    echo "<h3 class='sub-header'>Absensiku - <b>$bulan_ini</b> </h3><br>";
                    echo "<div class='table-responsive'>
			           <table class='table table-striped'>
			            <thead>
			               <tr>
                           <th scope='col'>No</th>
                           <th scope='col'>Tanggal</th>
                           <th scope='col'>Jam Masuk</th>
                           <th scope='col'>Jam Keluar</th>
                           <th scope='col'>Status</th>
			               </tr>
			            </thead>
			            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        $noUrut++;
                        $tanggal = format_hari_tanggal($row['tanggal']);
                        $jam_masuk = $row["jam_datang"];
                        $jam_pulang = $row["jam_pulang"];
                        $status = $row['status'];
                        echo "<tr>
                                        <td>$noUrut</td>
                                        <td>$tanggal</td>
                                        <td>$jam_masuk</td>
                                        <td>$jam_pulang</td>
                                        <td>";
                        if ($row['status'] == 'Tidak Terlambat') {
                            echo " <div class='mb-2 mr-2 badge badge-success'>Hadir</div>";
                        } elseif ($row['status'] == 'Terlambat') {
                            echo "<div class='mb-2 mr-2 badge badge-danger'>Terlambat</div>";
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
                echo "<div class='alert alert-warning'><strong>Tidak ada Absensi untuk ditampilkan.</strong></div>";
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