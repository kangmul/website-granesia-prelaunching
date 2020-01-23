<?php
//include ('db.php');
isset($_GET['id_link']) ? $id_link = $_GET['id_link'] : $id_link ='' ;

$query = "DELETE FROM link_terkait WHERE id_link='".$id_link."'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();
if($id_link != ''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}
$st = '1';
include ('linkterkait_data_view.php');


?>