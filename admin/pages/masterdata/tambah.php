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
                    Tambah karyawan <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>

        </div>

        <hr />
        <a href="data_karyawan.php" class="btn btn-primary" style="float: none;">Lihat data</a>
        <div class="conten">
            <?php
            include("koneksi.php");;
            $query = mysqli_query($koneksi, "SELECT max(kode_karyawan) AS last FROM tb_karyawan WHERE kode_karyawan");
            $data = mysqli_fetch_array($query);

            $kodeterakhir = $data['last'];

            $kodetambah = 1;
            $nextnomer = $kodeterakhir + $kodetambah;
            ?>
            <form method="post" action="prosestambah.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="card-body">
                    <input type="hidden" name="level" value="user" />
                    <div class="form-group">
                        <label for="validationCustom01">kode karyawan :</label>
                        <input class="form-control" name="kode_karyawan" value="<?php echo $nextnomer; ?>" id="validationCustom01" readonly required />
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Nama :</label>
                        <input class="form-control" name="nama_karyawan" id="validationCustom01" required />
                        <div class="invalid-feedback">
                            Masukan Nama...
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Jenis Kelamin :</label>
                        <select class="custom-select" name="jenis_kelamin" id="validationCustom04" required>
                            <option selected disabled value="">Pilih Jenis Kelamin...</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            Pilih Jenis Kelamin...
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Select Jabatan :</label>
                        <select class="custom-select" name="jabatan" id="validationCustom04" required>
                            <option selected disabled value="">Pilih Jabatan...</option>
                            <option value="boss">Bos</option>
                            <option value="manager">Manager</option>
                            <option value="hrd">HRD</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                        <div class="invalid-feedback">
                            Pilih Jabatan...
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Agama :</label>
                        <select class="custom-select" name="agama_karyawan" id="validationCustom04" required>
                            <option selected disabled value="">Pilih Agama...</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="buddha">Buddha</option>
                            <option value="katolik">Katolik</option>
                        </select>
                        <div class="invalid-feedback">
                            Pilih Agama...
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">tanggal lahir :</label>
                        <input class="form-control" name="tanggal_lahir" type="date" id="validationCustom04" required />
                        <div class="invalid-feedback">
                            Isi tanggal lahir...
                        </div>
                    </div>
                    <div class="form-groub">
                        <label for="validationCustom04">Telepon :</label>
                        <input type="number" name="tlp_karyawan" class="form-control" id="validationCustom04" required />
                        <div class="invalid-feedback">
                            isi Nomer Telpon...
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Alamat karywan :</label>
                        <textarea class="form-control" name="alamat_karyawan" id="validationCustom04" required></textarea>
                        <div class="invalid-feedback">
                            Isi alamat...
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Pilih Foto :</label>
                        <input type="file" name="foto" class="form-control-file" id="validationCustom04" required>
                        <div class="invalid-feedback">
                            Masukan foto...
                        </div>
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary">
                    <a href="data_karyawan.php" class="btn btn-danger">Kembali</a>
                    <br><br><br><br>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require("template/bawah.php");
?>