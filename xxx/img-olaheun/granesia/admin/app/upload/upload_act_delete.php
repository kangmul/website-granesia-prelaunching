<?php
include ('db.php');
isset($_GET['id']) ? $id = $_GET['id'] : $id ='' ;

$query1 = "SELECT * FROM tabel_data WHERE id='".$id."'";
$query2 = "DELETE FROM tabel_data WHERE id='".$id."'";

$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());


mysql_close();
//header ('Location:index.php'):''; 
$st = '1';
if($result2){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}

include ('upload_data_view.php');


?>