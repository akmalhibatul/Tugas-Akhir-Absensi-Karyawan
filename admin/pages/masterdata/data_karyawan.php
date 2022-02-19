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
                    Data karyawan <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>
        </div>
        <div class="conten">
            <?php
            if ($_GET['msg'] == 1 && $_SERVER['HTTP_REFERER']) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil Upload!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } else if ($_GET['msg'] == 2 && $_SERVER['HTTP_REFERER']) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal Upload!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } else if ($_GET['msg'] == 3 && $_SERVER['HTTP_REFERER']) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil Hapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } else if ($_GET['msg'] == 4 && $_SERVER['HTTP_REFERER']) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>gagal hapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } else if ($_GET['msg'] == 5 && $_SERVER['HTTP_REFERER']) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil Edit!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } else if ($_GET['msg'] == 6 && $_SERVER['HTTP_REFERER']) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal Edit!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <a href="tambah.php" class="btn btn-primary" style="margin: 15px 0 25px 0;">+Tambah karyawan </a>

            <div class='table-responsive'>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">kode Karyawan</th>
                            <th scope="col">Nama karyawan</th>
                            <th scope="col">jenis kelamin</th>
                            <th scope="col">jabatan</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Tanggal lahir</th>
                            <th scope="col">Nomer karyawan</th>
                            <th scope="col">Alamat karyawan</th>
                            <th scope="col">Foto karyawan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../koneksi.php");
                        $nomer = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $nomer++; ?></th>
                                <td><?php echo $data['kode_karyawan']; ?></td>
                                <td><?php echo $data['nama_karyawan']; ?></td>
                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                <td><?php echo $data['jabatan']; ?></td>
                                <td><?php echo $data['agama_karyawan']; ?></td>
                                <td><?php echo $data['tanggal_lahir']; ?></td>
                                <td><?php echo $data['tlp_karyawan']; ?></td>
                                <td><?php echo $data['alamat_karyawan']; ?></td>
                                <td><img src="../gambar/<?php echo $data['foto']; ?>" class="imgtable"></td>
                                <td><a href="edit.php?kode_karyawan=<?php echo $data['kode_karyawan']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="hapus.php?kode_karyawan=<?php echo $data['kode_karyawan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></a></td>
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