<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/icon/css/all.min.css" />
	<title>Rekap Absensi Toko Tegal Rotan</title>
</head>

<body>
	<?php

	$bulan = array(
		01 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);

	include "../koneksi.php";
	$tanggal = explode('-', $_GET['tanggal']); //2020-07-22
	$hitungan_tanggal = cal_days_in_month(CAL_GREGORIAN, $tanggal[1], $tanggal[0]);

	$data_bulan = intval($tanggal[1]);
	ob_start();
	?>

	<style>
		.green {
			width: 30px;
			background-color: green;
			text-align: center;
			color: red;
		}

		.orange {
			width: 30px;
			background-color: orange;
			text-align: center;
		}

		.red {
			width: 30px;
			background-color: red;
			text-align: center;
		}

		.no-absen {
			text-align: center;
		}

		.row {
			width: 30px;
		}

		.nama {
			width: 150px;
		}

		.center {
			text-align: center;
		}

		font {
			margin-left: 30px;
			margin-right: 30px;
		}
	</style>
	<!-- itu gak ada hubungannya sama dibawah ini -->
	<!-- lah trus buat apa wkwk asu main ngambil aja gua -->
	<h1 style="text-align: center;"><?php echo strtoupper("Rekapitulasi Absensi Bulan ") . strtoupper($bulan[$data_bulan]) ?></h1>
	<table border="1">
		<tr>
			<th>No</th>
			<th class="nama">Nama</th>
			<?php
			for ($i = 1; $i <= $hitungan_tanggal; $i++) {
			?>
				<th class="row"><?php echo $i ?></th>
			<?php
			}
			?>
			<th>Jumlah</th>
		</tr>

		<?php
		$no = 1;
		$query = $koneksi->query("SELECT * FROM tb_karyawan  ORDER BY id_karyawan");
		while ($data = $query->fetch_array()) {
			$data_result[] = array(
				'kode_karyawan' => $data['kode_karyawan'],
				'nama_karyawan' => $data['nama_karyawan'],

			);
		}
		?>

		<?php
		foreach ($data_result as $row) {
		?>
			<tr>
				<td style="text-align: center;"><?php echo $no ?></td>
				<td><?php echo $row['nama_karyawan'] ?></td>


			<?php
			$jumlah = $koneksi->query("SELECT *, COUNT(kode_karyawan) jumlah FROM rekap WHERE MONTH(tanggal) ='$tanggal[1]' AND kode_karyawan='$row[kode_karyawan]'");
			$jumlah_kehadiran = $jumlah->fetch_array();

			for ($i = 1; $i <= $hitungan_tanggal; $i++) {
				$kehadiran = $koneksi->query("SELECT * FROM rekap WHERE tanggal='$tanggal[0]-$tanggal[1]-$i' AND kode_karyawan='$row[kode_karyawan]' GROUP BY kode_karyawan");
				$data_kehadiran = $kehadiran->fetch_array();
				if (intval(substr($data_kehadiran['tanggal'], 8)) == $i) {
					$jadwal_id = $data_kehadiran['jadwal_id'];
					$jadwal_db = $koneksi->query("SELECT * FROM `jadwal` WHERE `id` = '$jadwal_id'");
					$data_jadwal = $jadwal_db->fetch_array();
					$nama_jadwal = ucfirst(substr($data_jadwal['shift'], 0, 1));

					if ($data_kehadiran['status'] == 'Pulang') {
						echo "<td class='orange'>H.$nama_jadwal</td>";
					} elseif ($data_kehadiran['status'] == "Cuti") {
						echo "<td class='orange'>C</td>";
					} elseif ($data_kehadiran['status'] == "Sakit") {
						echo "<td class='orange'>S</td>";
					} elseif ($data_kehadiran['status'] == "Dinas") {
						echo "<td class='orange'>D</td>";
					} elseif ($data_kehadiran['status'] == "Tidak Terlambat") {
						echo "<td class='orange'>&#8730;.$nama_jadwal</td>";
					} elseif ($data_kehadiran['status'] == "Terlambat") {
						echo "<td class='red'>T.$nama_jadwal</td>";
					} elseif ($data_kehadiran['status'] == "Off") {
						echo "<td class='orange'>O</td>";
					} else {
						echo "<td class='orange'>$nama_jadwal</td>";
					}
				} else {
					echo "<td class='no-absen'>-</td>";
				}
			}
			echo "<td class='no-absen'>" . $jumlah_kehadiran['jumlah'] . "</td>";
			echo "</tr>";
			$no++;
		}
			?>
	</table>

	<br><br>

	Keterangan * : <br>
	<font class='orange'>&nbsp; H &nbsp;</font> : ABSENSIN MASUK DAN PULANG <br>
	<font class='red'>&nbsp; T &nbsp;</font> : HADIR TAPI TERLAMBAT <br>
	<font class='orange'>&nbsp; &#8730; &nbsp;</font> : HANYA MASUK <br>
	<font class='orange'>&nbsp; C &nbsp;</font> : CUTI <br>
	<font class='orange'>&nbsp; D &nbsp;</font> : DINAS <br>
	<font class='orange'>&nbsp; S &nbsp;</font> : SAKIT <br>
	<font class='orange'>&nbsp; P &nbsp;</font> : Shift Pagi <br>
	<font class='orange'>&nbsp; M &nbsp;</font> : Shift Malam <br>
	<font class='orange'>&nbsp; B &nbsp;</font> : Shift Bebas <br>
	<font class='orange'>&nbsp; O &nbsp;</font> : Off <br>

	<div class='center'>
		Direktur
		<br><br><br><br>

		&copy; Hibatul Akmal
	</div>

</body>

</html>