<?php include('atas.php'); ?>
<?php if(isset($_GET['data'])){ ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
<thead>
		<tr>
			<th>No</th>
			<th>Kode Ciri</th>
			<th>Nama Ciri</th>
			<th>Opsi</th>
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
	<td align="center">
	<a title="edit" href="?edit&id=<?php echo $data['kd_gejala']; ?>" class="btn btn-success"><i class="icon-edit icon-white"></i></a>
	<a title="delete" href="?hapus&id=<?php echo $data['kd_gejala']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus..?');" ><i class="icon-trash icon-white"></i></a>
	</td>
</tr>
	<?php
	}
	?>
</tbody>
</table>
<?php } ?>

<?php if(isset($_GET['entri'])){  ?>
<form method="post" action="">
<font face="arial" color="#8f5a1c">
  <table class="table" width="450" border="0" cellpadding="2" cellspacing="1" align="center">
  <tr class="success text-center">
        <td colspan="2" >INPUT Ciri Bentuk Wajah</td>
  </tr>
  <tr>
    <td>Kode</td>
    <td><input class="form-control" name="kode" type="text" maxlength="4" size="6" value="<?php echo kdauto("gejala","C"); ?>" readonly>
    <input class="form-control" name="kode" type="hidden" value="<?php echo kdauto("gejala","C"); ?>">
	</td>
  </tr>
  <tr>
    <td width="90"> Nama Ciri</td>
    <td width="361">
	<textarea name="nmgejala" cols="10" rows="2"></textarea>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="simpan" value="Simpan" class="btn btn-success"> 
    	<input type="reset" value="Reset" name="Reset" class="btn btn-danger"></td>
  </tr>

  </table></font>
</form>
<?php }		
		if(isset($_POST['simpan'])){

		$kode=$_POST['kode'];
		$nmgejala=$_POST['nmgejala'];
		
		$sql="insert into gejala (kd_gejala,nm_gejala) values ('$kode','$nmgejala')";
		mysqli_query($koneksi, $sql);

		echo'<script type="text/javascript">
			alert("Data Ciri Baru Disimpan");
			window.location="?data"
		</script>';
		
		}
?>


<?php
	if(isset($_GET['hapus'])){
		$id=$_GET['id'];
		$sql="delete from gejala where kd_gejala='$id'";
		mysqli_query($koneksi, $sql);
		echo '<script type="text/javascript">
			//<![CDATA[
			window.location="?data"
			//]]>
		</script>';
	}
?>


<?php if(isset($_GET['edit'])){ 
$sql="select * from gejala where kd_gejala='$_GET[id]'";
$rs=mysqli_query($koneksi, $sql);
$row=mysqli_fetch_array($rs);
 { ?>
<form method="POST" action="">
<font face="arial" color="#8f5a1c">
  <table class="table" width="450" border="0" cellpadding="2" cellspacing="1" align="center">
  <tr class="success">
        <td colspan="2" class="center" >EDIT DATA Ciri Bentuk Wajah</td>
      </tr>
  <tr>
    <td>Kode Ciri</td>
    <td><input class="form-control" name="kd" type="text" maxlength="4" size="6" value="<?php echo $row['kd_gejala']; ?>" disabled="disabled">
    	<input name="id" type="text" value="<?php echo $row['kd_gejala']; ?>" >
    </td>
  </tr>
  <tr>
    <td width="90"> Nama Ciri</td>
    <td width="361">
    <input class="form-control" name="a" type="text" value="<?php echo $row['nm_gejala']; ?>" size="100" maxlength="100">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="edit" value="Simpan" class="btn btn-success"> 
    	<input type="reset" name="reset" value="Reset" class="btn btn-danger"> 
    </td>
  </tr>
  </table></font>
</form>

<?php	} 
		
		if(isset($_POST['edit'])){

		$a=$_POST['a'];
		$id=$_POST[id];
		
		$sql="update gejala set nm_gejala='$a' where kd_gejala='$id'";
		mysqli_query($koneksi, $sql);

		echo'<script type="text/javascript">
			alert("Data Ciri Berhasil Edit");
			window.location="?data"
		</script>';
		
		}
?>

<?php } ?>
<?php include('bawah.php'); ?>
