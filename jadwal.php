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
                    <i class="fas fa-calendar-alt mr-3">
                    </i>
                </div>

                <p>
                    Jadwal kerja <div class="page-title-subheading">Selamat Datang <b><?php echo $nama; ?></b> di Aplikasi Absensi

                </p>

            </div>
        </div>

        <div class="conten">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Shift</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM jadwal";
                    $result = $koneksi->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $Shift = $row['shift'];
                            $jam_masuk = $row['jam_masuk'];
                            $jam_keluar = $row['jam_keluar'];
                    ?>
                            <tr>
                                <th><?= $Shift ?></th>
                                <td><?= $jam_masuk ?></td>
                                <td><?= $jam_keluar ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<option value="">Jadwal not found</option>';
                    }
                    ?>
                </tbody>
                </form>
            </table>

        </div>
    </div>
</div>
</div>
<?php
require_once("template/bawah.php");
?>