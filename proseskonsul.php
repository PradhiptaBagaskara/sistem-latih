<?php 
include "conf/inc.koneksi.php";

	
# Baca variabel Form (If Register Global ON)
$RbPilih 	= $_REQUEST['RbPilih'];
$TxtKdGejala= $_REQUEST['TxtKdGejala'];

# Mendapatkan No IP
$NOIP 		= $_SERVER['REMOTE_ADDR'];

# Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($kdgejala, $NOIP) {
	include "conf/inc.koneksi.php";
	
	$sql_solusi = "SELECT rule.* FROM rule,tmp_solusi 
				  WHERE rule.kd_solusi=tmp_solusi.kd_solusi 
				  AND noip='$NOIP' ORDER BY rule.kd_solusi,rule.kd_gejala";
	$qry_solusi = mysqli_query($koneksi, $sql_solusi);
	while ($data_solusi = mysqli_fetch_array($qry_solusi)) {
		$sqltmp = "INSERT INTO tmp_analisa (noip, kd_solusi,kd_gejala)
					VALUES ('$NOIP','$data_solusi[kd_solusi]','$data_solusi[kd_gejala]')";
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

# PEMERIKSAAN
if ($RbPilih == "YA") {
	$sql_analisa = "SELECT * FROM tmp_analisa where noip='$NOIP' ";
	$qry_analisa = mysqli_query($koneksi, $sql_analisa);
	$data_cek = mysqli_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		DelTmpSakit($NOIP);
		foreach ($TxtKdGejala as $gjgj) {
			# code...
		
			$sql_tmp = "SELECT * FROM tmp_analisa 
						WHERE kd_gejala='$gjgj' 
						AND noip='$NOIP'";
			$qry_tmp = mysqli_query($koneksi, $sql_tmp);
			while ($data_tmp = mysqli_fetch_array($qry_tmp)) {
				$sql_rsolusi = "SELECT * FROM rule 
								WHERE kd_solusi='$data_tmp[kd_solusi]' 
								GROUP BY kd_solusi";
				$qry_rsolusi = mysqli_query($koneksi, $sql_rsolusi);
				while ($data_rsolusi = mysqli_fetch_array($qry_rsolusi)) {
					// Data solusi gizi yang mungkin dimasukkan ke tmp
					$sql_input = "INSERT INTO tmp_solusi (noip,kd_solusi)
								 VALUES ('$NOIP','$data_rsolusi[kd_solusi]')";
					mysqli_query($koneksi, $sql_input);
				}
			} 
			// Gunakan Fungsi
			DelTmpAnlisa($NOIP);
			AddTmpAnalisa($gjgj, $NOIP);
			AddTmpGejala($gjgj, $NOIP);
		}
	}	
	else {
		# Kode saat tmp_analisa kosong
		foreach ($TxtKdGejala as $key ) {
			# code...
			$sql_rgejala = "SELECT * FROM rule WHERE kd_gejala='$key'";
			$qry_rgejala = mysqli_query($koneksi, $sql_rgejala);
			while ($data_rgejala = mysqli_fetch_array($qry_rgejala)) {
				$sql_rsolusi = "SELECT * FROM rule 
							   WHERE kd_solusi='$data_rgejala[kd_solusi]' 
							   GROUP BY kd_solusi";
				$qry_rsolusi = mysqli_query($koneksi, $sql_rsolusi);
				while ($data_rsolusi = mysqli_fetch_array($qry_rsolusi)) {
					// Data solusi gizi yang mungkin dimasukkan ke tmp
					$sql_input = "INSERT INTO tmp_solusi (noip,kd_solusi)
								 VALUES ('$NOIP','$data_rsolusi[kd_solusi]')";
					mysqli_query($koneksi, $sql_input);
				}
			} 
			// Menggunakan Fungsi
			AddTmpAnalisa($key, $NOIP);
			AddTmpGejala($key, $NOIP);
		}
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=start'>";
}

if ($RbPilih == "TIDAK") {
	$sql_analisa = "SELECT * FROM tmp_analisa where noip='$NOIP' ";
	$qry_analisa = mysqli_query($koneksi, $sql_analisa);
	$data_cek = mysqli_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		$sql_rule = "SELECT * FROM tmp_analisa WHERE kd_gejala='$TxtKdGejala'";
		$qry_rule = mysqli_query($koneksi, $sql_rule);
		while($hsl_rule = mysqli_fetch_array($qry_rule)){
			// Hapus daftar rule yang sudah tidak mungkin dari tabel tmp
			$sql_deltmp = "DELETE FROM tmp_analisa 
							WHERE kd_solusi='$hsl_rule[kd_solusi]' 
							AND noip='$NOIP'";
			mysqli_query($koneksi, $sql_deltmp);
			
			// Hapus daftar solusi gizi yang sudah tidak ada kemungkinan
			$sql_deltmp2 = "DELETE FROM tmp_solusi 
						    WHERE kd_solusi='$hsl_rule[kd_solusi]' 
						    AND noip='$NOIP'";
			mysqli_query($koneksi, $sql_deltmp2);
		}		
	}
	else {
		# Pindahkan data relsi ke tmp_analisa
		$sql_rule= "SELECT * FROM rule ORDER BY kd_solusi,kd_gejala";
		$qry_rule= mysqli_query($koneksi, $sql_rule);
		while($hsl_rule=mysqli_fetch_array($qry_rule)){
			$sql_intmp = "INSERT INTO tmp_analisa (noip, kd_solusi,kd_gejala)
						  VALUES ('$NOIP','$hsl_rule[kd_solusi]',
						  '$hsl_rule[kd_gejala]')";
			mysqli_query($koneksi, $sql_intmp);
			
			// Masukkan data solusi gizi yang mungkin terjangkit
			$sql_intmp2 = "INSERT INTO tmp_solusi(noip,kd_solusi)
						   VALUES ('$NOIP','$hsl_rule[kd_solusi]')";
			mysqli_query($koneksi, $sql_intmp2);				
		}
		
		# Hapus tmp_analisa yang tidak sesuai
		$sql_rule2 = "SELECT * FROM rule WHERE kd_gejala='$TxtKdGejala'";
		$qry_rule2 = mysqli_query($koneksi, $sql_rule2);
		while($hsl_rule2 = mysqli_fetch_array($qry_rule2)){
			$sql_deltmp = "DELETE FROM tmp_analisa 
						   WHERE kd_solusi='$hsl_rule2[kd_solusi]' 
						   AND noip='$NOIP'";
			mysqli_query($koneksi, $sql_deltmp);
			
			// Hapus solusi gizi yang sudah tidak mungkin
			$sql_deltmp2 = "DELETE FROM tmp_solusi 
							WHERE kd_solusi='$hsl_rule2[kd_solusi]' 
							AND noip='$NOIP'";
			mysqli_query($koneksi, $sql_deltmp2);
		}
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=start'>";
}
?>
