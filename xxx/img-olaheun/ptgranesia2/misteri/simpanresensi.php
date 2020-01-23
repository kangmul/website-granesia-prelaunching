<?php
include("../../../koneksi.php");
$Judul = $_POST['Judul'];
$ket = $_POST['ket'];
$query = mysql_query("insert into resensi values  ('$Judul','$ket')");
echo ("<center>Data Telah di Simpan<br><a href=\"../../fitur/resensi.php\">Kembali</a></center>");
?>
