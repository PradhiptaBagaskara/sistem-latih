<?php
session_start();
include_once "inc.session.php";

session_destroy();
echo "<meta http-equiv='refresh' content='0;
url=index.php'>";
exit;
?>