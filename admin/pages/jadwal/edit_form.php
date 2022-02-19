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
            include("koneksi.php");
            $id = $_GET['id'];
            ?>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Edit Shift</h5>
                    <hr>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM rekap WHERE id='$id'");
                    while ($d = mysqli_fetch_array($sql)) {
                    ?>
                        <form action="simpan.php" method="POST" class="needs-validation" novalidate>
                            <div class="form-row">
                                <input type="text" name="id" class="form-control" value="<?php echo $d['id']; ?>" hidden>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" value="<?php echo $d['tanggal']; ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Shift</label>
                                    <?php $sf = $d['jadwal_id']; ?>
                                    <select name="jadwal_id" class="form-control">
                                        <option <?php echo ($sf == '1') ? "selected" : "" ?> value="1">Pagi</option>
                                        <option <?php echo ($sf == '2') ? "selected" : "" ?> value="2">Malam</option>
                                        <option <?php echo ($sf == '3') ? "selected" : "" ?> value="3">Bebas</option>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="data_karyawan.php?kode_karyawan=<?php echo $d['kode_karyawan']; ?>" class="btn btn-danger">Kembali</a>

                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require("template/bawah.php");
?>