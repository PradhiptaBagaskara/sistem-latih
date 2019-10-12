<?php
include "inc.session.php";
include "inc.kodeauto.php";
include "inc.koneksi.php";

# Baca variabel Form (If Register Global ON)
$TxtKodeH = $_REQUEST['TxtKodeH'];
$CekGejala = $_REQUEST['CekGejala'];

# Validasi Form
$TxtKodeH=$_POST['CmbSolusi'];
	$jum = count($CekGejala);
	if ($jum==0) {
		echo "BELUM ADA GEJALA YANG DIPILIH";
	}
	else {
		# UNTUK MENGHAPUS YANG TIDAK DIPILIH LAGI
			// Kode untuk mendata rule
			$sqlpil = "SELECT * FROM rule WHERE kd_solusi='$TxtKodeH'";
			$qrypil = mysqli_query($koneksi, $sqlpil);
			while ($datapil=mysqli_fetch_array($qrypil)){
			// Kode untuk mengurai Gejala yang dipilih
				for ($i = 0; $i < $jum; ++$i) {
			// Perintah untuk menghapus rule
				if ($datapil['kd_gejala'] != $CekGejala[$i]) {
					$sqldel = "DELETE FROM rule ";
					$sqldel .= "WHERE kd_solusi='$TxtKodeH' ";
					$sqldel .= "AND NOT kd_gejala IN ('$CekGejala[$i]')";
					mysqli_query($koneksi, $sqldel);
				}
			}
		}
		
		# UNTUK DATA GEJALA TAMBAHAN
		for ($i = 0; $i < $jum; ++$i) {
			// Perintah untuk mendapat rule
			$sqlr = "SELECT * FROM rule ";
			$sqlr .= "WHERE kd_solusi='$TxtKodeH' ";
			$sqlr .= "AND kd_gejala='$CekGejala[$i]'";
			$qryr = mysqli_query($koneksi, $sqlr);
			$cocok = mysqli_num_rows($qryr);
				// Gejala yang baru akan disimpan
			if (! $cocok==1) {
			
			$sql = "INSERT INTO rule (kd_solusi,kd_gejala) ";
			$sql .= "VALUES ('$TxtKodeH','$CekGejala[$i]')";
			mysqli_query($koneksi, $sql)
				or die ("SQL Input rule Gagal".mysqli_error());
			}
		}
			// Pesan sebagai konfirmasi
		echo'<script type="text/javascript">
			alert("Data Rule Baru Tersimpan");
			window.location="?data"
		</script>';
	
	}
?>