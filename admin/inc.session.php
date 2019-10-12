<?php
error_reporting(0);
session_start();
if(! ($_SESSION))
{
	echo "<div align=center><b> PERHATIAN! </b><br>";
	echo "AKSES DITOLAK, BELUM LOGIN </div>";
	include "index.php";
	exit;
}

?>