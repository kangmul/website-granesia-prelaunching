<?php
include("../../../koneksi.php");

$ket = $_POST['ket'];
$query = mysql_query("insert into visimisi values  ('$ket')");
echo ("<center>Data Telah di Simpan<br><a href=\"../../fitur/visimisi.php\">Kembali</a></center>");
?>
