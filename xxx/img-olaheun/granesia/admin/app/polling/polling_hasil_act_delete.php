<?php
include ('db.php');
isset($_GET['id_tanya']) ? $id_tanya = $_GET['id_tanya'] : $id_tanya ='' ;

$query1 = "SELECT * FROM hasil WHERE id_tanya ='".$id_tanya."'";
$query2 = "DELETE FROM hasil WHERE id_tanya ='".$id_tanya."'";

$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());

mysql_close();
//header ('Location:index.php'):''; 
$st = '1';
if($result2){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}

include ('polling_form_view.php');


?>