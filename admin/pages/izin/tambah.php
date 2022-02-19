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
                    Permission <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>
        </div>
        <div class="conten">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Izin</h5>
                    <div class="col-md-12">
                        <?php if (isset($_SESSION['status'])) {
                        ?>
                            <div class="alert alert-<?php echo $_SESSION['status'][0] . ' fade show'; ?>" role="alert"><?php echo $_SESSION['status'][1] . " " . $_SESSION['status'][2]; ?></div>
                        <?php
                        }
                        unset($_SESSION['status']);
                        ?>
                    </div>
                    <hr>
                    <form method="post" action="proses_permission.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Nama Pemohon</label>
                                <select name="pemohon" class="custom-select" id="validationCustom01" required>
                                    <option selected disabled value="">-- Pilih Karyawan --</option>
                                    <?php
                                    $data = $koneksi->query("SELECT * FROM tb_karyawan");
                                    while ($d = $data->fetch_array()) {
                                    ?>
                                        <option value="<?php echo $d['kode_karyawan'] ?>"><?php echo $d['kode_karyawan'] ?> - <?php echo $d['nama_karyawan'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    -- Pilih Karyawan --
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
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
                        <a href="data_permission.php" class="btn btn-warning">Lihat Data</a>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
require("template/bawah.php");
?>