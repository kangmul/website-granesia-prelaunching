<?php
include("../../../koneksi.php");

$ket = $_POST['ket'];
$query = mysql_query("insert into sejarah values  ('$ket')");
echo ("<center>Data Telah di Simpan<br><a href=\"../../fitur/sejarah.php\">Kembali</a></center>");
?>
