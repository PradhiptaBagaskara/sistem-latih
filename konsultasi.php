<?php
include "conf/inc.koneksi.php";
?>
<div class="panel panel-default">
  <div class="panel-body">
    <form method="post" action="?page=processreg" >
		<table class="table">
			<tr class="success">
				<td colspan="2" >Daftar Konsultasi</td>
			</tr>
			<tr>
				<td >Nama</td>
				<td><input class="form-control"  type="text" name="nama" value="" placeholder="Isi Nama Lengkap" /></td>
			</tr>
			<tr>
				<td >Alamat</td>
				<td><input class="form-control"  type="text" name="alamat" value=""  placeholder="Isi Alamat Lengkap"/></td>
			</tr>
			<tr>
				<td >Pekerjaan</td>
				<td><input class="form-control"  type="text" name="pekerjaan" value="" placeholder="Isi Pekerjaan Anda" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td>	<input type="submit" class="btn btn-success" name="daftar" value="DAFTAR" />
									<input type="reset" class="btn btn-danger" name="reset" value="BATAL" />
				</td>
			</tr>
		</table>
	</form>

  </div>
</div>
