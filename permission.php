<?php
require("template/header.php");
?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn a" id="menu-toggle">
            <i class="fas fa-align-justify"></i>
        </button>
        <img src="admin/pages/gambar/persegi panjang.png" width="140">
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-sticky-note mr-3">
                        </i>
                    </div>

                    <p>
                        Tambah Permission <div class="page-title-subheading">Selamat Datang di Aplikasi Absensi
                    </p>

                </div>
            </div>
            <div class="conten">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Izin</h5>
                        <hr>
                        <form method="post" action="proses.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <?php
                            include("koneksi.php");
                            $kode_karyawan = $_GET['kode_karyawan'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE kode_karyawan = '$kode_karyawan'");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <div class="form-row">
                                    <input type="text" name="pemohon" value="<?php echo $data['kode_karyawan'] ?>" hidden>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Keterangan Izin</label>
                                        <select name="izin" id="" class="custom-select" id="validationCustom01" required>
                                            <option selected disabled value="">-- Pilih Izin --</option>
                                            <option value="Cuti"> Cuti </option>
                                            <option value="Sakit"> Sakit </option>
                                            <option value="Dinas"> Perjalanan Dinas </option>
                                            <option value="Off">OFF Kerja</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            -- Pilih Izin --
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Dari Tanggal</label>
                                        <input type="date" class="form-control" name="dari" id="validationCustom01" required>
                                        <div class="invalid-feedback">
                                            -- Masukan Tanggal --
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Sampai Tanggal</label>
                                        <input type="date" class="form-control" name="sampai" id="validationCustom01" required>
                                        <div class="invalid-feedback">
                                            -- Masukan Tanggal --
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom01">Keterngan Izin</label>
                                        <textarea name="keterangan" class="form-control" id="validationCustom01" required></textarea>
                                        <div class="invalid-feedback">
                                            -- Isi Keterangan Izin --
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <input type="submit" class="btn btn-primary" value="Simpan">
                                <input type="reset" class="btn btn-danger" value="Reset">

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