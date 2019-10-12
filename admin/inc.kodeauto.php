<?php
function kdauto($tabel, $inisial) {
	$struktur = mysqli_query($koneksi, "SELECT * FROM $tabel");
	$field = mysqli_field_name($struktur,0);
	$panjang = mysqli_field_len($struktur,0);
	
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
	