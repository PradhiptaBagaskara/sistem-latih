<?php
session_start();
include_once "inc.koneksi.php";

$TxtUser = $_REQUEST['TxtUser'];
$TxtPasswd = $_REQUEST['TxtPasswd'];

if (trim($TxtUser)=="") {
	echo "DATA USER BELUM DIISI";
	include "index.php"; exit;
}
elseif (trim($TxtPasswd)=="") {
	echo "DATA PASSWORD BELUM DIISI";
	include "index.php"; exit;
}

// SQL untuk memeriksa data User dan Password
$sql_cek = "SELECT * FROM admin WHERE nmlogin='$TxtUser'
	AND pslogin=md5('$TxtPasswd')";
$qry_cek = mysqli_query($koneksi, $sql_cek)
	or die ("Gagal Cek".mysqli_error());
$ada_cek = mysqli_num_rows($qry_cek);

// Periksa apakah ada data yang sesuai
if ($ada_cek >=1) {
	$SES_USER=$TxtUser;
	$_SESSION[SES_USER]= $SES_USER;
	
	header ("location: admin.php?home");
	exit;
}
else {
	echo "USER DAN PASSWORD TIDAK SESUAI";
	include "index.php";
	exit;
}

?>