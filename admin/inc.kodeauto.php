<?php
function kdauto($tabel, $inisial) {
	include 'inc.koneksi.php';
	$struktur = mysqli_query($koneksi, "SELECT * FROM $tabel");
	$fe = mysqli_fetch_field($struktur);
	$field = $fe->name;
	$panjang = $fe->max_length;
	
	$qry = mysqli_query($koneksi, "SELECT max(".$field.") FROM ".$tabel);
	$row = mysqli_fetch_array($qry);
	if ($row[0]=="") {
		$angka=0;
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}
	
	$angka++;
	$angka =strval($angka);
	$tmp ="";
	for ($i=1; $i <= ($panjang-strlen($inisial)-strlen($angka)); $i++) {
			$tmp=$tmp."0";
	}
	return $inisial.$tmp.$angka;
}
?>
	