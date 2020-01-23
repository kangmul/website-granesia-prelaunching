<?php
//include ('db.php');
if(isset($_GET['id_pekerjaan'])){
$id_pekerjaan = $_GET['id_pekerjaan'];

$query = "DELETE FROM pekerjaan WHERE id_pekerjaan='".$id_pekerjaan."'";
$result = mysql_query($query) or die(mysql_error());

	mysql_close();
	if ($result > 0) {
		$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Hapus</b> </b></div></p>';
	$st='1';
	include ('pekerjaan_data_view.php');
}
}
?>