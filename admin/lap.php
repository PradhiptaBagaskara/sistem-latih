<?php 
include 'inc.koneksi.php'; 
include 'inc.session.php';
?>
<?php if(isset($_GET['gejala'])){ ?>
<body onload="window.print();" Layout="Portrait">
<center><h3>LAPORAN DATA CIRI BENTUK WAJAH</h3></center>
<table border=1 width=600>
<thead>
		<tr>
			<th>No</th>
			<th>Kode Ciri</th>
			<th>Nama Ciri</th>
		</tr>
	</thead>
<tbody>
<?php
	$no=0;
	$sql = "SELECT * FROM gejala ORDER BY kd_gejala";
	$qry = mysqli_query($koneksi, $sql)
		or die ("SQL Error".mysqli_error());
	while ($data=mysqli_fetch_array($qry)) {
	$no++;
?>
<tr class="odd gradeX">
	<td class="center"><?php echo $no; ?></td>
	<td><?php echo $data['kd_gejala']; ?></td>
	<td><?php echo $data['nm_gejala']; ?></td>
</tr>
	<?php
	}
	?>
</tbody>
</table>
</body>
<?php } ?>

<?php if(isset($_GET['solusi'])){ ?>
<body onload="window.print();" Layout="Portrait">
<center><h3>LAPORAN DATA BENTUK WAJAH DAN SOLUSI</h3></center>
<table border=1 width=700>
<thead>
		<tr>
			<th>No</th>
			<th>Kode Solusi</th>
			<th>Nama Solusi</th>
			<th>Solusi</th>
		</tr>
	</thead>
<tbody>
<?php
	$no=0;
	$sql = "SELECT * FROM solusi ORDER BY kd_solusi";
	$qry = mysqli_query($koneksi, $sql)
		or die ("SQL Error".mysqli_error());
	while ($data=mysqli_fetch_array($qry)) {
	$no++;
?>
<tr class="odd gradeX">
	<td class="center"><?php echo $no; ?></td>
	<td><?php echo $data['kd_solusi']; ?></td>
	<td><?php echo $data['nm_solusi']; ?></td>
	<td><?php echo $data['solusi']; ?></td>
</tr>
	<?php
	}
	?>
</tbody>
</table>
</body>
<?php } ?>


<?php if(isset($_GET['diagnosa'])){ ?>
<body onload="window.print();" Layout="Landscape">
<center><h3>LAPORAN DATA KONSULTASI</h3></center>
<table border=1 width=1000>
<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Tanggal Konsultasi</th>
			<th>Bentuk Wajah</th>
		</tr>
	</thead>
<tbody>
<?php
	$no=0;
	$sql = "SELECT analisa_hasil.nama,analisa_hasil.kelamin,analisa_hasil.alamat,analisa_hasil.pekerjaan,
	analisa_hasil.tanggal,solusi.nm_solusi	 FROM analisa_hasil,solusi 
	where analisa_hasil.kd_solusi=solusi.kd_solusi ORDER BY analisa_hasil.id desc";
	$qry = mysqli_query($koneksi, $sql)
		or die ("SQL Error".mysqli_error());
	while ($data=mysqli_fetch_array($qry)) {
	$no++;
?>
<tr class="odd gradeX">
	<td class="center"><?php echo $no; ?></td>
	<td><?php echo $data['nama']; ?></td>
	
	<td><?php echo $data['alamat']; ?></td>
	<td><?php echo $data['pekerjaan']; ?></td>
	<td><?php echo $data['tanggal']; ?></td>
	<td><?php echo $data['nm_solusi']; ?></td>
</tr>
	<?php
	}
	?>
</tbody>
</table>
</body>
<?php } ?>
