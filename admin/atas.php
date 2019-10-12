<?php
include "inc.session.php";
include "inc.koneksi.php";
include "inc.kodeauto.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Administrator</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
		<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="js/datatable.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="js/boot.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="js/bootstrap.min.js"></script>
		<style type="text/css">
		  body {
			padding-top: 60px;
			padding-bottom: 40px;
		  }
		</style>
	</head>
	<body>
	<div class="navbar  navbar-fixed-top">
	  <div class="navbar-inner">
		<div class="container">
		  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="brand" href="http://localhost/exsys" target="_blank">Tata Rias</a>
		  <div class="nav-collapse collapse">
			<ul class="nav">
			  <li class="active"><a href="admin.php?home">Home</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ciri ciri <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="gejala.php?data">Data Ciri </a></li>
				  <li><a href="gejala.php?entri">Entri Ciri</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Solusi <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="solusi.php?data">Data Solusi</a></li>
				  <li><a href="solusi.php?entri">Entri Solusi</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Rule <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="rule.php?data">Data Rule</a></li>
				  <li><a href="rule.php?entri">Entri Rule</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Buku Saran <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="tamu.php?data">Data Saran</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="user.php?data">Data User</a></li>
				  <li><a href="user.php?entri">Entri User</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="lap.php?diagnosa" target="_blank">Lap. Data Konsultasi</a></li>
				  <li><a href="lap.php?gejala" target="_blank">Lap. Data ciri</a></li>
				  <li><a href="lap.php?solusi" target="_blank">Lap. Data Solusi</a></li>
				</ul>
			  </li>
			  <li><a href="loginout.php">Logout</a></li>
			</ul>
			<p class="navbar-text pull-right" >
				<b class="navbar-link">Hallo <?php echo $_SESSION['SES_USER']; ?> </b>
			</p>
		  </div><!--/.nav-collapse -->
		</div>
	  </div>
	</div>
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	 selector: "textarea",
	theme: "modern",
	plugins: [
		 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		 "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
		{title: 'Bold text', inline: 'b'},
		{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		{title: 'Example 1', inline: 'span', classes: 'example1'},
		{title: 'Example 2', inline: 'span', classes: 'example2'},
		{title: 'Table styles'},
		{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
	]
 });
</script>
	<div class="container">
	  <!-- Main hero unit for a primary marketing message or call to action -->
	  <div class="">
