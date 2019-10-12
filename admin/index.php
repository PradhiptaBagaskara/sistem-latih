<?php
include "inc.koneksi.php";
include "inc.kodeauto.php";
// error_reporting(0);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
		<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="js/datatable.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="js/boot.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
	  body {
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #f5f5f5;
	  }

	  .form-signin {
		max-width: 300px;
		padding: 19px 29px 29px;
		margin: 0 auto 20px;
		background-color: #fff;
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 5px;
		   -moz-border-radius: 5px;
				border-radius: 5px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
				box-shadow: 0 1px 2px rgba(0,0,0,.05);
	  }
	  .form-signin .form-signin-heading,
	  .form-signin .checkbox {
		margin-bottom: 10px;
	  }
	  .form-signin input[type="text"],
	  .form-signin input[type="password"] {
		font-size: 16px;
		height: auto;
		margin-bottom: 15px;
		padding: 7px 9px;
	  }

	</style>
	</head>
	<body>
	<div class="container">
	  <form class="form-signin"  method="post" action="loginperiksa.php">
		<h3>Silahkan Masuk</h3>
		<input type="text" autofocus class="input-block-level" name="TxtUser" placeholder="Username">
		<input type="password" class="input-block-level" name="TxtPasswd" placeholder="Password">
		<input type="submit" name="Login" value="Login" class="btn btn-large btn-primary" />
	  </form>
	</div
	</body>
</html>