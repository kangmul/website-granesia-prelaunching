<?php
//include ('db.php');

isset($_GET['id_perusahaan'])?$id_perusahaan = $_GET['id_perusahaan'] : $id_perusahaan ='';

$query = "DELETE FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
$result = mysql_query($query) or die(mysql_error());

	mysql_close();
	if($id_perusahaan !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
	}
	$st = '1';
	include ('perusahaan_data_view.php');


?>