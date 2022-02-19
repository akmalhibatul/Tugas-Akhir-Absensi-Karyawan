<?php
require("template/header.php");
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-id-card mr-3">
                    </i>
                </div>

                <p>
                    Edit karyawan <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>

        </div>

        <hr />
        <a href="data_karyawan.php" class="btn btn-primary" style="float: none;">Lihat data</a>
        <div class="conten">

            <form method="post" action="simpan.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                <?php
                include("koneksi.php");
                $kode_karyawan = $_GET['kode_karyawan'];
                $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE kode_karyawan='$kode_karyawan'");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="card-body">
                        <input type="hidden" name="id_karyawan" value="<?= $row['id_karyawan']; ?>" />
                        <div class="form-group">
                            <label for="validationCustom01">kode karyawan :</label>
                            <input class="form-control" name="kode_karyawan" value="<?php echo $row['kode_karyawan']; ?>" id="validationCustom01" readonly required />
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Nama :</label>
                            <input class="form-control" name="nama_karyawan" id="validationCustom01" value="<?php echo $row['nama_karyawan']; ?>" required />
                            <div class="invalid-feedback">
                                Masukan Nama...
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Jenis Kelamin :</label>
                            <?php $jk = $row['jenis_kelamin']; ?>
                            <select class="custom-select" name="jenis_kelamin" id="validationCustom01" required>
                                <option selected disabled value="">Pilih Jenis Kelamin...</option>
                                <option <?php echo ($jk == 'laki-laki') ? "selected" : "" ?>>laki-laki</option>
                                <option <?php echo ($jk == 'perempuan') ? "selected" : "" ?>>perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Jenis Kelamin...
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Select Jabatan :</label>
                            <?php $jabatan = $row['jabatan']; ?>
                            <select class="custom-select" name="jabatan" id="validationCustom01" required>
                                <option selected disabled value="">Pilih Jabatan...</option>
                                <option <?php echo ($jabatan == 'boss') ? "selected" : "" ?>>bos</option>
                                <option <?php echo ($jabatan == 'manager') ? "selected" : "" ?>>manager</option>
                                <option <?php echo ($jabatan == 'hrd') ? "selected" : "" ?>>hrd</option>
                                <option <?php echo ($jabatan == 'karyawan') ? "selected" : "" ?>>karyawan</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Jabatan...
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Agama :</label>
                            <?php $agama = $row['agama_karyawan']; ?>
                            <select class="custom-select" name="agama_karyawan" id="validationCustom01" required>
                                <option <?php echo ($agama == 'islam') ? "selected" : "" ?>>islam</option>
                                <option <?php echo ($agama == 'kristen') ? "selected" : "" ?>>kristen</option>
                                <option <?php echo ($agama == 'buddha') ? "selected" : "" ?>>buddha</option>
                                <option <?php echo ($agama == 'katolik') ? "selected" : "" ?>>katolik</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Agama...
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">tanggal lahir :</label>
                            <input class="form-control" name="tanggal_lahir" type="date" value="<?php echo $row['tanggal_lahir']; ?>" id="validationCustom01" required />
                            <div class="invalid-feedback">
                                isi tanggal lahir...
                            </div>
                        </div>
                        <div class="form-groub">
                            <label for="validationCustom01">Telepon :</label>
                            <input type="number" name="tlp_karyawan" class="form-control" value="<?php echo $row['tlp_karyawan']; ?>" id="validationCustom01" required />
                            <div class="invalid-feedback">
                                isi Nomer Telepon...
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01">Alamat karywan :</label>
                            <textarea class="form-control" name="alamat_karyawan" id="validationCustom01" required><?php echo $row['alamat_karyawan'] ?></textarea>
                            <div class="invalid-feedback">
                                isi Alamat...
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Upload Foto :</label><br>

                            <img src="../gambar/<?php echo $row['foto']; ?>" style="width: 120px;float: left;margin-bottom: 10px;">
                            <input type="file" name="foto" id="foto"><br>
                            <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk&nbsp;</i>
                        </div>
                        <br><br><br><br><br><br><br>

                        <input type="submit" name="submit" class="btn btn-primary">
                        <a href="data_karyawan.php" class="btn btn-danger">Kembali</a>
                        <br><br><br><br>
                    </div>
                <?php } ?>

            </form>
        </div>
    </div>
</div>

<?php
require("template/bawah.php");
?>