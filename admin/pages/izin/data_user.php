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
                    Rekap Absen <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
                </p>

            </div>

        </div>

        <hr />
        <div class="conten">


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">kode karyawan</th>
                        <th scope="col">nama karyawan</th>
                        <th scope="col">aksi</th>
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
                            <td><a href="rekap_permission.php?kode_karyawan=<?php echo $data['kode_karyawan']; ?>" class="btn btn-primary">Lihat Data</a></td>
                        </tr>

                </tbody>
            <?php } ?>
            </table>


        </div>
    </div>
</div>

<?php
require("template/bawah.php");
?>