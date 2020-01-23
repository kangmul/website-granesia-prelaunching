<?php
//include ('db.php');

isset($_GET['id'])?$id = $_GET['id'] : $id ='';


$query = "DELETE FROM sistem_kerja WHERE id='".$id."'";
$result = mysql_query($query) or die(mysql_error());

	mysql_close();
	if($id !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
	}
	$st = '1';
	include ('sistemkerja_data_view.php');




?>