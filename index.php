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
          <i class="fas fa-tachometer-alt mr-3">
          </i>
        </div>

        <p>
          Dashboard <div class="page-title-subheading">Selamat Datang <b><?php echo $nama; ?></b> di Aplikasi Absensi
        </p>

      </div>
      <div class="conten">
        <?php
        if ($_GET['msg'] == 2 && $_SERVER['HTTP_REFERER']) {
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat Datang <?= $nama; ?>!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
        }
        ?>

        <?php
        require_once("koneksi.php");
        include 'indo_format.php';

        $sql = "SELECT * FROM `rekap` JOIN `tb_login` ON tb_login.kode_karyawan = rekap.kode_karyawan WHERE rekap.kode_karyawan = $username AND DATE(`tanggal`) = CURDATE() ORDER BY rekap.id DESC
        ";
        $result = $koneksi->query($sql);
        if ($result->num_rows > 0) {
          $nomer = 0;
          echo "<div class='main-card mb-3 card'>
          <div class='card-body'>
            <h5 class='card-title'><b>Data Absen Hari ini</b></h5>
            <div class='col-md-12'>
              <hr>
              <div class='table-responsive'>
                <table class='table'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Nama Karyawan</th>
                      <th scope='col'>Tanggal Absen</th>
                      <th scope='col'>Jam Masuk</th>
                      <th scope='col'>Jam Keluar</th>
                      <th scope='col'>Shift</th>
                      <th scope='col'>Status</th>
    
                    </tr>
                  </thead>
                  <tbody>";
          while ($row = $result->fetch_assoc()) {
            $nomer++;
            $nama = $row['nama'];
            $tanggal = format_hari_tanggal($row['tanggal']);
            $jam_masuk = $row["jam_datang"];
            $jam_pulang = $row["jam_pulang"];
            $shift = $row['jadwal_id'];
            $status = $row['status'];
            echo "<tr>
            <td>$nomer</td>
            <td>$nama</td>
            <td>$tanggal</td>
            <td>$jam_masuk</td>
            <td>$jam_pulang</td>
            <td>";
            if ($row['jadwal_id'] == '1') {
              echo " <div class='mb-2 mr-2 badge badge-info'>Pagi</div>";
            } elseif ($row['jadwal_id'] == '2') {
              echo "<div class='mb-2 mr-2 badge badge-info'>Malam</div>";
            } elseif ($row['jadwal_id'] == '3') {
              echo "<div class='mb-2 mr-2 badge badge-info'>Bebas</div>";
            } else {
              echo "<div class='mb-2 mr-2 badge badge-danger'>$status</div>";
            };
            echo "</td>
            <td>
            ";
            if ($row['status'] == 'Tidak Terlambat') {
              echo " <div class='mb-2 mr-2 badge badge-success'>Hadir</div>";
            } elseif ($row['status'] == 'Terlambat') {
              echo "<div class='mb-2 mr-2 badge badge-danger'>Terlambat</div>";
            } else {
              echo "<div class='mb-2 mr-2 badge badge-danger'>$status</div>";
            };
            echo "</td></tr></tbody>";
          }
          echo "</table></div><br>";
        } else {
          echo "
          <div class='main-card mb-3 card'>
          <div class='card-body'>
            <h5 class='card-title'><b>Data Absen Anda Hari ini</b></h5>
            <div class='col-md-12'>
              <hr>
              <div class='table-responsive'>
                <table class='table'>
                  <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Nama Karyawan</th>
                      <th scope='col'>Tanggal Absen</th>
                      <th scope='col'>Jam Masuk</th>
                      <th scope='col'>Jam Keluar</th>
                      <th scope='col'>Shift</th>
                      <th scope='col'>Status</th>
    
                    </tr>
                  </thead>
                  <tbody>
                  <td colspan='7'><div class='alert alert-warning'><strong>Anda Belum Absen Hari ini.</strong></div></td>
         
          </tbody></table></div>
          ";
        }
        ?>
      </div>
    </div>
  </div>
</div>
</div>
<?php
require_once("template/bawah.php");
?>