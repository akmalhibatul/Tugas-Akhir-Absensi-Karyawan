<?php
require("template/header.php");
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-book mr-3">
                    </i>
                </div>

                <p>
                    Rekap Absen <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>

        </div>

        <hr />
        <div class="conten">
            <div class="col-md-12">

                <form action="#" method="post">
                    <div class="col-md-3">
                        <input type="date" name="rule" id="" class="mb-2 form-control-sm form-control" style="border-radius: 0;" value="<?php echo $_POST['rule'] ?>">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Lihat" class="btn btn-info">

                        <a href="rekap_absen.php" class="btn btn-success">Lihat Semua</a>
                        <a href="data_absen.php" class="btn btn-secondary">Lihat rekap user</a>
                </form>
                <?php
                if (@$_POST['rule']) {
                    $tanggal = $_POST['rule'];
                } else {
                    $tanggal = date('Y-m-d');
                }
                ?>

                <a href="absensi_cetak.php/?tanggal=<?php echo $tanggal ?>" class="btn btn-info" target="_blank" style="float: right;"><span class="fas fa-print"></span></a>
            </div>





            <br>

        </div>
        <div class='table-responsive'>
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Absen</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Shift</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../koneksi.php");
                    include("../indo_format.php");
                    $nomer = 1;
                    if (isset($_POST['rule'])) {
                        $query = mysqli_query($koneksi, "SELECT * FROM `rekap` LEFT JOIN `tb_login` ON rekap.kode_karyawan = tb_login.kode_karyawan WHERE rekap.tanggal='$_POST[rule]' ORDER BY tanggal DESC");
                    } else {
                        $query = mysqli_query($koneksi, "SELECT * FROM `rekap` LEFT JOIN `tb_login` ON rekap.kode_karyawan = tb_login.kode_karyawan ORDER BY tanggal DESC");
                    }
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $nomer++; ?></th>
                            <td><?php echo $data['nama']; ?></td>
                            <!-- disini doang berarti? iya -->
                            <td><?php echo format_hari_tanggal($data['tanggal']); ?></td>
                            <td><?php echo $data['jam_datang']; ?></td>
                            <td><?php echo $data['jam_pulang']; ?></td>
                            <td>
                                <?php
                                if ($data['jadwal_id'] == '1') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-info">Pagi</div>
                                <?php
                                } elseif ($data['jadwal_id'] == '2') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-info">Malam</div>
                                <?php
                                } elseif ($data['jadwal_id'] == '3') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-info">Bebas</div>
                                <?php
                                } else {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-info"><?php echo $data['status'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($data['status'] == 'Tidak Terlambat') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-info">Hadir</div>
                                <?php
                                } elseif ($data['status'] == 'Terlambat') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-danger">Terlambat</div>
                                <?php
                                } elseif ($data['status'] == 'Pulang') {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-success">Pulang</div>
                                <?php
                                } else {
                                ?>
                                    <div class="mb-2 mr-2 badge badge-danger"><?php echo $data['status'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table><br><br>
        </div>
    </div>
</div>
</div>

<?php
require("template/bawah.php");
?>