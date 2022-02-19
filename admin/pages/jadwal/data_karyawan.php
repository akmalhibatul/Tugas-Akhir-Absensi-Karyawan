<?php
require("template/header.php");
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-calendar-alt mr-3">
                    </i>
                </div>

                <p>
                    Data Jadwal Kerja Karyawan<div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>

        </div>

        <hr />
        <div class="conten">
            <?php
            include("../koneksi.php");
            include("../indo_format.php");
            $kode_karyawan = $_GET['kode_karyawan'];
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>tanggal</th>
                        <th>Shift</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $nomer = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM rekap WHERE kode_karyawan='$kode_karyawan' ORDER BY id LIMIT 7");
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $nomer++; ?></td>
                            <td><?php echo format_hari_tanggal($row['tanggal']); ?></td>
                            <td>
                                <?php
                                if ($row['jadwal_id'] == '1') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-success">Pagi</div>
                                <?php
                                } elseif ($row['jadwal_id'] == '2') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-success">Malam</div>
                                <?php
                                } elseif ($row['jadwal_id'] == '3') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-success">Bebas</div>
                                <?php
                                } else {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-success"><?php echo $row['status'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a href="edit_form.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>

                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require("template/bawah.php");
?>