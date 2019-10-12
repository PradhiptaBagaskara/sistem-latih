<?php
$page = (isset($_GET['page']))? $_GET['page'] : "welcome";
switch ($page) {
	case 'consultation': include "konsultasi.php"; break;
	case 'question'	: include "tanya.php"; break;
	case 'guest' : include "tanya.php"; break;
	case 'help' : include "help.php"; break;
	case 'contact' : include "kontak.php"; break;
	case 'start' : include "mulai.php"; break;
	case 'processreg' : include "prosesdaftar.php"; break;
	case 'processcon' : include "proseskonsul.php"; break;
	case 'result' : include "analisahasil.php"; break;
	case 'article' : include "artikel.php"; break;
	case 'read' : include "baca.php"; break;

	case 'welcome' :
	default : include 'home.php';	
}
?>