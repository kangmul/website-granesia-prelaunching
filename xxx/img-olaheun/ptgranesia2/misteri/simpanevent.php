<?php
include("../../../koneksi.php");
$nama = $_POST['nama'];
$ket = $_POST['ket'];
$query = mysql_query("insert into event values  ('$nama','$ket')");
echo ("<center>Data Telah di Simpan<br><a href=\"../../fitur/event.php\">Kembali</a></center>");
?>
