<?php
include "conf/inc.koneksi.php";

$NOIP = $_SERVER['REMOTE_ADDR'];

# Periksa apabila sudah ditemukan
// Periksa data solusi di dalam tmp
$sql_cekh = "SELECT * FROM tmp_solusi WHERE noip='$NOIP' GROUP BY kd_solusi";
$qry_cekh = mysqli_query($koneksi, $sql_cekh);
$hsl_cekh = mysqli_num_rows($qry_cekh);
if ($hsl_cekh == 1) {
	// Apabila data tmp_solusi isinya 1
	$hsl_data = mysqli_fetch_array($qry_cekh);
	
	// Memindahkan data tmp ke tabel hasil_analisa
	$sql_pasien = "SELECT * FROM tmp_pasien WHERE noip='$NOIP'";
	$qry_pasien = mysqli_query($koneksi, $sql_pasien);
	$hsl_pasien = mysqli_fetch_array($qry_pasien);
		// Perintah untuk memindah data
		$sql_in = "INSERT INTO analisa_hasil SET
			nama='$hsl_pasien[nama]',
			pekerjaan='$hsl_pasien[pekerjaan]',
			kd_solusi='$hsl_data[kd_solusi]',
			noip='$hsl_pasien[noip]',
			tanggal='$hsl_pasien[tanggal]'";
			mysqli_query($koneksi, $sql_in);
			
		// Redireksi setelah pemindahan data
			echo "<meta http-equiv='refresh' content='0;
			url=index.php?page=result'>";
		exit;
}

# Apabila BELUM MENEMUKAN solusi
$sqlcek = "SELECT * FROM tmp_analisa WHERE noip='$NOIP'";
$qrycek = mysqli_query($koneksi, $sqlcek);
$datacek = mysqli_num_rows($qrycek);
if ($datacek >= 1) {
	// Seandainya tmp_analisa tidak kosong
	// SQL ambil data gejala yang tidak ada di dalam
	// tabel tmp_gejala (NOT IN....)
	$sqlg = "SELECT gejala.* FROM gejala,tmp_analisa
		WHERE gejala.kd_gejala=tmp_analisa.kd_gejala
		AND tmp_analisa.noip='$NOIP'
		AND NOT tmp_analisa.kd_gejala
		IN(SELECT kd_gejala
			FROM tmp_gejala WHERE noip='$NOIP')
			ORDER BY gejala.kd_gejala LIMIT 1";
	$qryg = mysqli_query($koneksi, $sqlg);
	$datag = mysqli_fetch_array($qryg);
		
	$kdgejala = $datag['kd_gejala'];
	$gejala = $datag['nm_gejala'];
}
else {
	// Seandainya tmp kosong
	// Ambil data gejala dari tabel gejala
	$sqlg = "SELECT * FROM gejala ORDER BY kd_gejala LIMIT 1";
	$qryg = mysqli_query($koneksi, $sqlg);
	$datag = mysqli_fetch_array($qryg);
	
	$kdgejala = $datag['kd_gejala'];
	$gejala = $datag['nm_gejala'];
	$geje = "gaul";
}
?>


<div class="panel panel-default">
  <div class="panel-body">
<form action="?page=processcon" method="post" name="form1" target="_self">
	<table class="table" width="100%" border="0" cellpadding="2" cellspacing="1" >
	<tr class="success">
				<td colspan="2" >SILAHKAN PILIH UNTUK MENEMUKAN SOLUSI :</td>
	</tr>
	
</table>

		<?php 
			$ab = mysqli_query($koneksi, " select gejala.* from gejala,rule where gejala.kd_gejala = rule.kd_gejala");
			while ($a = mysqli_fetch_array($ab)) {
				# code...
		?>
			<div class="input-group">
			<span class="input-group-addon">
			<input type="checkbox" name="TxtKdGejala[]" value="<?php echo  $a['kd_gejala']; ?>">
			</span>
			<input class="form-control" value="<?php echo strip_tags($a['nm_gejala']); ?>" readonly>
			</div><br>
		<?php 
			}

		 ?>
			<input type="hidden" name="RbPilih" value="YA">
			<input type="submit" class="btn btn-success text-center" name="Submit" value="PROSES >>"></td>

</form>

  </div>
</div>
