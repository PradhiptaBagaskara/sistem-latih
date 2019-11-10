<?php
$my['host']	= "localhost";
$my['user']	= "root";
$my['pass']	= "";
$my['dbs']	= "dbpakar";

$koneksi	= mysqli_connect($my['host'], 
							$my['user'], 
							$my['pass'],
							$my['dbs']);
if (! $koneksi) {
  echo "Gagal koneksi ..!";
  // mysqli_error();
}
// mysqli_select_db($my['dbs'])
// 	 or die ("Database tidak ditemukan".mysqli_error());

?>