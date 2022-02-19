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
                    Jadwal Kerja <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>

        </div>

        <hr />
        <div class="conten">
            <?php
            if ($_GET['msg'] == 1 && $_SERVER['HTTP_REFERER']) {
            ?>
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-w300 my-2">Gagal</h3>
                </div>
            <?php
            } else if ($_GET['msg'] == 2 && $_SERVER['HTTP_REFERER']) {
            ?>
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-w300 my-2">Berhasil</h3>
                </div>
            <?php
            }
            ?>
            <div class="conten">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Tambah Absen</b></h5>
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
                        <form method="post" action="proses_jadwal.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Nama Pemohon</label>
                                    <select name="kode_karyawan" class="custom-select" id="validationCustom01" required>
                                        <option selected disabled value="">-- Pilih Karyawan --</option>
                                        <?php
                                        $data = $koneksi->query("SELECT * FROM tb_karyawan");
                                        while ($d = $data->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $d['kode_karyawan'] ?>"><?php echo $d['nama_karyawan'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        -- Pilih karyawan --
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Shift</label>
                                    <select name="jadwal_id" class="custom-select" id="validationCustom01" required>
                                        <option selected disabled value="">-- Pilih Shift --</option>
                                        <option value="1"> Pagi </option>
                                        <option value="2"> Malam </option>
                                        <option value="3"> Bebas </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        -- Pilih Shift --
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

                            <br>

                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <input type="reset" class="btn btn-danger" value="Reset">

                        </form>
                    </div>
                </div>
                <form action="jadwal_post.php" method="POST">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title"><b>Jadwal Kerja</b></h5>
                            <div class="block-content block-content-full">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hari</th>
                                            <th scope="col">Jam Masuk</th>
                                            <th scope="col">Jam Keluar</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM jadwal";
                                        $result = $koneksi->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['id'];
                                                $shift = $row['shift'];
                                                $jam_masuk = $row['jam_masuk'];
                                                $jam_keluar = $row['jam_keluar'];
                                        ?>
                                                <tr>
                                                    <th><?= $shift ?></th>
                                                    <td><?= $jam_masuk ?></td>
                                                    <td><?= $jam_keluar ?></td>
                                                    <td>
                                                        <a href="jadwal_form.php?id=<?= $id ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo '<option value="">Siswa not found</option>';
                                        }
                                        ?>
                                    </tbody>
                </form>
                </table>
            </div>
        </div>
    </div>
    </form>
    <div class="main-card mb-12 card" style="margin-bottom: 120px;">
        <div class="card-body">
            <h5 class="card-title"><b>Data Jadwal Kerja karyawan</b></h5>
            <table class="table col-md-12">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $nomer = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $nomer++; ?></td>
                            <td><?php echo $row['nama_karyawan']; ?></td>
                            <td>
                                <a href="data_karyawan.php?kode_karyawan=<?php echo $row['kode_karyawan']; ?>" class="btn btn-primary">Lihat data</a>
                            </td>
                        </tr>

                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
</div>

</div>
</div>

<?php
require("template/bawah.php");
?>