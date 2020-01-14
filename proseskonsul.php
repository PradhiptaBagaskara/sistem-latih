<?php 
include "conf/inc.koneksi.php";

	

$NOIP 		= $_SERVER['REMOTE_ADDR'];

if (isset($_POST)) {
	if ($_POST['RbPilih'] == 'YA') {
		$TxtKdGejala = $_POST['TxtKdGejala'];
		periksa($TxtKdGejala);
	}
}
# Fungsi hapus tabel tmp_gejala
function AddTmpGejala($kdgejala, $NOIP) {
	include "conf/inc.koneksi.php";

	$sql_gejala = "INSERT INTO tmp_gejala (noip,kd_gejala) VALUES ('$NOIP','$kdgejala')";
	mysqli_query($koneksi, $sql_gejala);
}

# Fungsi hapus tabel tmp_sakit
function DelTmpSakit($NOIP) {
	include "conf/inc.koneksi.php";
	
	$sql_del = "DELETE FROM tmp_solusi WHERE noip='$NOIP'";
	mysqli_query($koneksi, $sql_del);
}

# Fungsi hapus tabel tmp_analisa
function DelTmpAnlisa($NOIP) {
	include "conf/inc.koneksi.php";
	
	$sql_del = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
	mysqli_query($koneksi, $sql_del);
}

function AddToSolusi()
{
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
	$sqltmp = "INSERT INTO tmp_solusi (kd_solusi,noip)
					VALUES ('".$hasil."','".$NOIP."')";
	mysqli_query($koneksi, $sqltmp);
}

function periksa($data=[])
{
include "conf/inc.koneksi.php";

	$NOIP 		= $_SERVER['REMOTE_ADDR'];

	$sql_analisa = "SELECT * FROM tmp_analisa where noip='$NOIP' ";
	$qry_analisa = mysqli_query($koneksi, $sql_analisa);
	$data_cek = mysqli_num_rows($qry_analisa);
	if ($data_cek > 0) {

		foreach ($data as $key) {

			$sql_rgejala = "SELECT * FROM rule WHERE kd_gejala='$key'";
			$qry_rgejala = mysqli_query($koneksi, $sql_rgejala);
			$data_rgejala = mysqli_fetch_array($qry_rgejala);		
			$sol = $data_rgejala['kd_solusi'];
			$sql_input = "INSERT INTO tmp_analisa (noip,kd_solusi,kd_gejala,status)
						 VALUES ('".$NOIP."','".$data_rgejala['kd_solusi']."','".$key."','Y')";
			mysqli_query($koneksi, $sql_input) or die("erorr".mysqli_error($koneksi));
			
		// AddTmpAnalisa($key, $NOIP);
		AddTmpGejala($key, $NOIP); 
			
	}


}else{
		foreach ($data as $key) {
			# code...
			// echo $key;
		$sql_rgejala = "SELECT * FROM rule WHERE kd_gejala='$key'";
		$qry_rgejala = mysqli_query($koneksi, $sql_rgejala);
		$data_rgejala = mysqli_fetch_array($qry_rgejala);		
		$sol = $data_rgejala['kd_solusi'];
		$sql_input = "INSERT INTO tmp_analisa (noip,kd_solusi,kd_gejala,status)
						 VALUES ('".$NOIP."','".$data_rgejala['kd_solusi']."','".$key."','Y')";
		mysqli_query($koneksi, $sql_input) or die("erorr".mysqli_error($koneksi));
		// 				// return 'data ke insert';
					
			
		// AddTmpAnalisa($key, $NOIP);
		AddTmpGejala($key, $NOIP); 
		}

	}
		// DelTmpAnlisa($NOIP);
		AddToSolusi();

		echo  "<meta http-equiv='refresh' content='0; url=index.php?page=start'>";
}


?>
