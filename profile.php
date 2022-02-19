<?php
require_once("template/header.php");
?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn a" id="menu-toggle">
            <i class="fas fa-align-justify"></i>
        </button>
        <img src="admin/pages/gambar/persegi panjang.png" width="140">
    </nav>

    <div class="container-fluid">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-users">
                    </i>
                </div>

                <p>
                    Profile <div class="page-title-subheading">Selamat Datang <b><?php echo $nama; ?></b> di Aplikasi Absensi
                </p>

            </div>
        </div>
        <center>
            <div class="kotak">
                <?php
                include("koneksi.php");
                $kode_karyawan = $_GET['kode_karyawan'];
                $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE kode_karyawan='$kode_karyawan'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <img src="admin/pages/gambar/<?php echo $data['foto']; ?>" alt="" class="imgprofile">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row" colspan="2">Kode Karyawan :</th>
                                <td colspan="2"><?php echo $data['kode_karyawan']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">Nama :</th>
                                <td colspan="2"><?php echo $data['nama_karyawan']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">Jenis kelamin :</th>
                                <td colspan="2"><?php echo $data['jenis_kelamin']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">Jabatan :</th>
                                <td colspan="2"><?php echo $data['jabatan']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">Agama :</th>
                                <td colspan="2"><?php echo $data['agama_karyawan']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">Tanggal lahir :</th>
                                <td colspan="2"><?php echo $data['tanggal_lahir']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">Telepon karyawan :</th>
                                <td colspan="2"><?php echo $data['tlp_karyawan']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="2">Alamat :</th>
                                <td colspan="2"><?php echo $data['alamat_karyawan']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="index.php" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>
            </div>
        <?php } ?>
        </center>
        <div id="footer">
            <footer>
                Copyright &copy; 2020 Hibatul Akmal
            </footer>
        </div>

    </div>
</div>
<!-- /#page-content-wrapper -->
</div>
<?php
require_once("template/bawah.php");
?>