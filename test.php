<?php 

include 'conf/inc.koneksi.php';
$NOIP 		= $_SERVER['REMOTE_ADDR'];
// echo $NOIP;

$sql = "select * from tmp_analisa where noip='".$NOIP."'";
$qry = mysqli_query($koneksi, $sql);
// $ds = array();
$no = 1;
$ds = array();
while ($a = mysqli_fetch_array($qry)) {
		$c = $a['kd_solusi'];
		$query = mysqli_num_rows(mysqli_query($koneksi, "select kd_solusi from tmp_analisa where kd_solusi='".$c."'"));

		$no += 1 	;
		$ds[$c] = $query;
}
$hasil = array_search(max($ds), $ds );
echo $hasil;



