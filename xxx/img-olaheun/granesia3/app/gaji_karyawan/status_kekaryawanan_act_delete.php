<?php
//include ('db.php');

$id_status = isset($_GET['id_status']) ? $_GET['id_status'] : null;
$index = isset($_GET['index']) ? $_GET['index'] : null;
//$idp = $_GET['idp'];
$query = "DELETE FROM status_karyawan WHERE id_status='$id_status'";

	
$result = mysql_query($query) or die(mysql_error());

//unlink($_SERVER['DOCUMENT_ROOT'].'/pertamina/app/karyawan/pdf/'.$sertifikat);
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
mysql_close();
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=relasikerja&index=$index';
			</script>";


?>