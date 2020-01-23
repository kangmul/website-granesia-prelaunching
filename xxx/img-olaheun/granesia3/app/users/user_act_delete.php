<?php
include ('db.php');

$nik = $_GET['nik'];

$query = "UPDATE tkjp SET status = 'tidak aktif' WHERE nik='$nik'";

		
$result = mysql_query($query) or die(mysql_error());

mysql_close();

include('karyawan_form_view.php');


?>