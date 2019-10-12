<?php include "conf/inc.koneksi.php"; ?>
<div class="panel panel-default">
  <div class="panel-body">
    <form method="post" action="">
<table class="table table-hover">
	<tr class="success">
		<td colspan=2>SARAN</td>
	</tr>	
	<tr>
		<td >Nama</td>
		<td><input class="form-control"  autofocus required type="text" class="span11" name="a" value=""  /></td>
	</tr>
	<tr>
		<td >Email</td>
		<td><input class="form-control"  required type="email" class="span11" name="b" value=""  /></td>
	</tr>
	<tr>
		<td >Isi Pesan</td>
		<td><textarea name="c" class="form-control" row="3"></textarea></td>
	</tr>
		<tr>
		<td>&nbsp;</td><td>	<input type="submit" class="btn btn-primary" name="kirim" value="KIRIM" /></td>
	</tr>
</table>
</form>
<?php	if(isset($_POST['kirim'])){
		$a=$_POST['a']; 
		$b=$_POST['b'];
		$c=$_POST['c']; 
		$sql="insert into buku_tamu values('','$a','$b','$c')";
		if(mysqli_query($koneksi, $sql))
		echo '<script type="text/javascript">
			//<![CDATA[
			alert("Terimakasih, Balasan Dikrim Lewat Email");
			window.location="?page=home";
			//]]>
		</script>';
		else
		echo '<script type="text/javascript">
			//<![CDATA[
			alert("Gagal Mohon Periksa Kembali");
			window.location="?page=guest";
			//]]>
		</script>';
		} ?>
  </div>
</div>
