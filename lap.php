<?php
include "conf/inc.koneksi.php";

# Mendapatkan No IP Lokal
$NOIP = $_SERVER['REMOTE_ADDR'];

# Perintah Ambil data analisa_hasil
$sql = "SELECT analisa_hasil.*, solusi.*
	FROM analisa_hasil,solusi
	WHERE solusi.kd_solusi=analisa_hasil.kd_solusi
	AND analisa_hasil.noip='$NOIP'
	ORDER BY analisa_hasil.id DESC LIMIT 1";
$qry = mysqli_query($koneksi, $sql)
	or die ("Query Hasil salam".mysqli_error());
$data= mysqli_fetch_array($qry);

$sql2 = "SELECT * FROM tmp_pasien WHERE noip='$NOIP'";
$qry2 = mysqli_query($koneksi, $sql2)
	or die ("Query Hasil salam".mysqli_error());
$data2= mysqli_fetch_array($qry2);

?>


<body onload="window.print();" Layout="Portrait">

<table width="100%" border="0" cellpadding="3" cellspacing="1">
	<tr align="center">
		<td colspan="3">
		<font color="#d1ad2e"><b>HASIL DIAGNOSA PENYAKIT GIGI DAN MULUT</b></font><hr color="#d1ad2e" ></td>
	</tr>
	<tr>
		<td colspan="3"><b>DATA PASIEN:</b></td>
	</tr>
	<tr>
		<td width="86">Nama </td><td> : </td>
		<td width="689"> <?php echo $data2['nama']; ?></td>
	</tr>
	<tr>
		<td>Alamat </td><td> : </td>
		<td> <?php echo $data2['alamat']; ?></td>
	</tr>
	<tr>
		<td>Pekerjaan </td><td> : </td>
		<td> <?php echo $data2['pekerjaan']; ?></td>
	</tr>
	</table>

	<table width="100%" border="0" cellpadding="2" cellspacing="1">
	<tr>
		<td colspan="2"><b>HASIL ANALISA TERAKHIR:</b></td>
	</tr>
	<tr>
		<td width="86">Penyakit </td>
		<td width="689"><?php echo $data['nm_solusi']; ?></td>
	</tr>

	<tr>
		<td valign="top"> </td>
		<td>
		<?php
		# Menampilkan Daftar Gejala
	$sql_gejala = "SELECT gejala.* FROM gejala,rule
		WHERE gejala.kd_gejala=rule.kd_gejala
		AND rule.kd_solusi='$data[kd_solusi]' order by gejala.kd_gejala";
	$qry_gejala = mysqli_query($koneksi, $sql_gejala);
	$i = 0;
	while ($hsl_gejala=mysqli_fetch_array($qry_gejala)) {
	$i++;
		echo "$i . $hsl_gejala[nm_gejala] <br>";
	}
?>
		</td>
	</tr>
	<tr>
		<td valign="top">Solusi</td>
		<td><?php echo $data['solusi']; ?></td>
	</tr>
</table>

</body>
