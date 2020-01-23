<?php
//include ('db.php');

isset($_GET['id_klasifikasi'])? $id_klasifikasi = $_GET['id_klasifikasi'] : $id_klasifikasi ='';

$query = "DELETE FROM klasifikasi WHERE id_klasifikasi='".$id_klasifikasi."'";
$result = mysql_query($query) or die(mysql_error());

	mysql_close();
	if($id_klasifikasi !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
	}
	$st = '1';
	include ('klasifikasi_data_view.php');
?>