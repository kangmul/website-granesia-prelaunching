<?php
//include ('db.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
$sertifikat = $_GET['sertifikat'];
$query = "DELETE FROM berkas_sertifikat WHERE sertifikat='$sertifikat'";

	
$result = mysql_query($query) or die(mysql_error());

unlink($_SERVER['DOCUMENT_ROOT'].'/pertamina/app/karyawan/pdf/'.$sertifikat);
mysql_close();

echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=berkas&index=$index';
			</script>";
?>