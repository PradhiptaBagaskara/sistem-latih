<?php 
include "conf/inc.koneksi.php";

	
# Baca variabel Form (If Register Global ON)
$RbPilih 	= $_REQUEST['RbPilih'];
$TxtKdGejala= $_REQUEST['TxtKdGejala'];
// var_dump($TxtKdGejala);
// foreach ($TxtKdGejala as $key) {
// 	echo $key;
// }
// var_dump(periksa($TxtKdGejala));
# Mendapatkan No IP
$NOIP 		= $_SERVER['REMOTE_ADDR'];

// Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($kdgejala, $NOIP) {
	include "conf/inc.koneksi.php";
	
	$sql_solusi = "SELECT rule.* FROM rule,tmp_solusi 
				  WHERE rule.kd_solusi=tmp_solusi.kd_solusi 
				  AND noip='$NOIP' ORDER BY rule.kd_solusi,rule.kd_gejala";
	$qry_solusi = mysqli_query($koneksi, $sql_solusi);
	while ($data_solusi = mysqli_fetch_array($qry_solusi)) {
		$kdgejala = replaceWithBr($data_solusi['kd_gejala']);

		$sqltmp = "INSERT INTO tmp_analisa (noip, kd_solusi,kd_gejala)
					VALUES ('$NOIP','$data_solusi[kd_solusi]','$kdgejala')";
		mysqli_query($koneksi, $sqltmp);
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



function periksa($data=[])
{
include "conf/inc.koneksi.php";

	$NOIP 		= $_SERVER['REMOTE_ADDR'];

	$sql_analisa = "SELECT * FROM tmp_analisa where noip='$NOIP' ";
	$qry_analisa = mysqli_query($koneksi, $sql_analisa);
	$data_cek = mysqli_num_rows($qry_analisa);
	if ($data_cek > 0) {
		foreach ($data as $key) {
			$sql_tmp = "SELECT * FROM tmp_analisa 
 						WHERE kd_gejala='$key' 
					AND noip='$NOIP'";
			$qry_tmp = mysqli_query($koneksi, $sql_tmp);
			while ($data_tmp = mysqli_fetch_array($qry_tmp)) {
				$kdgejala = replaceWithBr($data_tmp['kd_solusi']);

				$sql_rsolusi = "SELECT * FROM rule 
								WHERE kd_solusi='$kdgejala' 
								GROUP BY kd_solusi";
				$qry_rsolusi = mysqli_query($koneksi, $sql_rsolusi);
				while ($data_rsolusi = mysqli_fetch_array($qry_rsolusi)) {
					// Data solusi gizi yang mungkin dimasukkan ke tmp
					$kdsolusi = replaceWithBr($data_rsolusi['kd_solusi']);

					$sql_input = "INSERT INTO tmp_solusi (noip,kd_solusi)
								 VALUES ('$NOIP','$kdsolusi')";
					mysqli_query($koneksi, $sql_input);
			}
		}
		DelTmpAnlisa($NOIP);
			AddTmpAnalisa($key, $NOIP);
			AddTmpGejala($key, $NOIP);
	}


}else{
		foreach ($data as $key) {
			# code...
		$sql_rgejala = "SELECT * FROM rule WHERE kd_gejala='$key'";
		$qry_rgejala = mysqli_query($koneksi, $sql_rgejala);
		while ($data_rgejala = mysqli_fetch_array($qry_rgejala)) {
				$sql_rsolusi = "SELECT * FROM rule 
							   WHERE kd_solusi='$data_rgejala[kd_solusi]' 
							   GROUP BY kd_solusi";
				$qry_rsolusi = mysqli_query($koneksi, $sql_rsolusi);

				while ($data_rsolusi = mysqli_fetch_array($qry_rsolusi)) {
					// // Data solusi gizi yang mungkin dimasukkan ke tmp
					$sol = $data_rsolusi['kd_solusi'];
					$sql_input = "INSERT INTO tmp_solusi (noip,kd_solusi)
								 VALUES ('".$NOIP."','".$data_rsolusi['kd_solusi']."')";
					mysqli_query($koneksi, $sql_input) or die("erorr".mysqli_error($koneksi));
						// return 'data ke insert';
					
				}
			}
			AddTmpAnalisa($key, $NOIP);
			AddTmpGejala($key, $NOIP); 
		}

	}
	return "<meta http-equiv='refresh' content='0; url=index.php?page=start'>";
}
if (isset($_POST)) {
	if ($_POST['RbPilih'] == 'YA') {
		$ta = periksa($TxtKdGejala);
		echo $ta;
	}
}

?>
