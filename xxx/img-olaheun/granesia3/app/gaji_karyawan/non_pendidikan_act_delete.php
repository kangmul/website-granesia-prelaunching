<?php
//include ('db.php');

$idp_non = isset($_GET['idp_non']) ? $_GET['idp_non'] : null;
$index = isset($_GET['index']) ? $_GET['index'] : null;
//$idp = $_GET['idp'];
$query = "DELETE FROM pdk_non_formal WHERE idp_non='$idp_non'";

	
$result = mysql_query($query) or die(mysql_error());

//unlink($_SERVER['DOCUMENT_ROOT'].'/pertamina/app/karyawan/pdf/'.$sertifikat);
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
mysql_close();
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=profil&index=$index';
			</script>";


?>