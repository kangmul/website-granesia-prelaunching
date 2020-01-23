<?php
include("../../../koneksi.php");

$ket = $_POST['ket'];
$query = mysql_query("insert into award values  ('$ket')");
echo ("<center>Data Telah di Simpan<br><a href=\"../../fitur/pilihan/award.php\">Kembali</a></center>");
?>
