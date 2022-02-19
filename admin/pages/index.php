<?php
require_once("template/header.php");
?>
<div id="page-content-wrapper">
  <div class="container-fluid">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="fas fa-tachometer-alt mr-3">
          </i>
        </div>

        <p>
          Dasboard <div class="page-title-subheading">Selamat Datang <b><?php echo $username; ?></b> di Aplikasi Absensi
        </p>

      </div>
    </div>
    <div class="conten">
      <?php
      if ($_GET['msg'] == 2 && $_SERVER['HTTP_REFERER']) {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Selamat Datang <?= $username; ?>!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
      ?>

      <div class="col col-6">
        <?php
        include 'koneksi.php';
        $data_karyawan = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
        $jumlah_karyawan = mysqli_num_rows($data_karyawan);
        $data_absen = mysqli_query($koneksi, "SELECT * FROM rekap");
        $jumlah_absen = mysqli_num_rows($data_absen);
        ?>
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $jumlah_karyawan; ?></h3>
            <p>Jumlah Karyawan</p>
          </div>
        </div>
      </div>

      <div class="col col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $jumlah_absen; ?></h3>
            <p>Jumlah Absen</p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <div class="col col-12">
    <?php
    require_once("koneksi.php");
    include 'indo_format.php';

    $sql = "SELECT * FROM `rekap` JOIN `tb_login` ON tb_login.kode_karyawan = rekap.kode_karyawan WHERE DATE(`tanggal`) = CURDATE() ORDER BY rekap.id DESC
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
            <h5 class='card-title'><b>Data Absen Hari ini</b></h5>
            <div class='col-md-12'>
              <hr>
              <div class='table-responsive'>
                <table class='table' >
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
                  <td colspan='7'><div class='alert alert-warning'><strong>Belum ada Absen Hari ini.</strong></div></td>
         
          </tbody></table></div>
          ";
    }
    ?>
  </div>
  <?php
  require_once("template/bawah.php");
  ?>