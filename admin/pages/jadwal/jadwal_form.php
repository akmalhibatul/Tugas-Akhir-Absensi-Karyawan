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
                    Edit Jadwal Kerja <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>
        </div>
        <div class="conten">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <?php
                    include("../koneksi.php");
                    date_default_timezone_set('Asia/Jakarta');
                    $id = $_GET['id'];
                    $query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id='$id'");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <h5 class="card-title">Edit Jadwal Hari <b> <?php echo $data['hari']; ?></b></h5>
                        <hr>
                        <form method="post" action="simpan_jadwal.php" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <input type="text" value="<?php echo $data['id']; ?>" name="id" hidden>
                                    <label for="validationCustom01">Jam Masuk</label>
                                    <input type="time" class="form-control" name="jam_masuk" value="<?php echo $data['jam_masuk']; ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Jam Pulang</label>
                                    <input type="time" class="form-control" name="jam_keluar" value="<?php echo $data['jam_keluar']; ?>">
                                </div>
                            </div>
                        <?php } ?><br>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="data_jadwal.php" class="btn btn-danger">Kembali</a>
                        </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
require("template/bawah.php");
?>