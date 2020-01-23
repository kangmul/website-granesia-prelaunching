<?php
//include ('db.php');

isset($_GET['index'])? $index = $_GET['index'] : $index ='';

//$no = $_GET['no'];

$query = "DELETE FROM tkjp WHERE tkjp.index='".$index."'";
$result = mysql_query($query) or die(mysql_error());

	mysql_close();
	if($index !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Pekerja Berhasil Dihapus</b> </b></div></p>';
	}
	$st = '1';
	include ('karyawan_history_data_view.php');
?>