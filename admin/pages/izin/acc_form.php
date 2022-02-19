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
                    Konfirmasi Permission <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>
        </div>
        <div class="conten">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Izin</h5>
                    <hr>
                    <form method="post" action="acc_iz.php" enctype="multipart/form-data">
                        <?php
                        include("../koneksi.php");
                        $id = $_GET['id'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_permission INNER JOIN tb_karyawan ON tb_permission.kode_karyawan = tb_karyawan.kode_karyawan WHERE id='$id'");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <input type="text" value="<?php echo $data['id']; ?>" name="id" hidden>
                                    <label for="validationCustom01">Nama Karyawan</label>
                                    <select name="pemohon" class="form-control" readonly>
                                        <option value="<?php echo $data['kode_karyawan'] ?>"><?php echo $data['nama_karyawan'] ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Keterangan Izin</label>
                                    <input type="text" class="form-control" name="izin" value="<?php echo $data['izin']; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Dari Tanggal</label>
                                    <input type="date" class="form-control" name="dari" value="<?php echo $data['dari']; ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Sampai Tanggal</label>
                                    <input type="date" class="form-control" name="sampai" value="<?php echo $data['sampai']; ?>" readonly>
                                </div>
                            </div>
                            <?php date_default_timezone_set('Asia/Jakarta');
                            ?>
                            <input type="hidden" name="jam" class="form-control" value="<?php echo date('H:i:s'); ?>" readonly>
                            <div class="form-row">
                                <div class="col-md-12 mb-12">
                                    <label for="validationCustom01">Keterangan</label>
                                    <textarea name="keterangan" placeholder="Keterngan Izin" id="" class="form-control" readonly><?php echo $data['keterangan']; ?></textarea>
                                </div>
                            </div>
                        <?php } ?><br>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="data_permission.php" class="btn btn-danger">Kembali</a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
require("template/bawah.php");
?>