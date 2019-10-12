<?php 
include "conf/inc.koneksi.php";
	
# Baca variabel Form (If Register Global ON)
$nama 	= $_REQUEST['nama'];
$alamat 	= $_REQUEST['alamat'];
$pekerjaan= $_REQUEST['pekerjaan'];

# Validasi Form
if (trim($nama)=="") {
	include "konsultasi.php";
	echo "Nama belum diisi, ulangi kembali";
}
elseif (trim($alamat)=="") {
	include "konsultasi.php";
	echo "Alamat masih kosong, ulangi kembali";
}
elseif (trim($pekerjaan)=="") {
	include "konsultasi.php";
	echo "Pekerjaan masih kosong, ulangi kembali";
}
else {
    $NOIP = $_SERVER['REMOTE_ADDR'];
	$sqldel = "DELETE FROM tmp_pasien WHERE noip='$NOIP'";
	mysqli_query($koneksi, $sqldel);
	
	$sql  = " INSERT INTO tmp_pasien (nama,alamat,pekerjaan,noip,tanggal) 
		 	  VALUES ('$nama','$alamat','$pekerjaan','$NOIP',NOW())";
	mysqli_query($koneksi, $sql) 
		  or die ("SQL Error 2".mysqli_error());
	
	$sqlhapus = "DELETE FROM tmp_solusi WHERE noip='$NOIP'";
	mysqli_query($koneksi, $sqlhapus) 
			or die ("SQL Error 1".mysqli_error());
	
	$sqlhapus2 = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
	mysqli_query($koneksi, $sqlhapus2)
			or die ("SQL Error 2".mysqli_error());
			
	$sqlhapus3 = "DELETE FROM tmp_gejala WHERE noip='$NOIP'";
	mysqli_query($koneksi, $sqlhapus3) 
			or die ("SQL Error 3".mysqli_error());
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=start'>";
}
?>
