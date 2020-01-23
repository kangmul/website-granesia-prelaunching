<?php
include ('db.php');
isset($_GET['id']) ? $id = $_GET['id'] : $id ='' ;

$query1 = "SELECT * FROM foto WHERE id='".$id."'";
$query2 = "DELETE FROM foto WHERE id='".$id."'";

$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());

$gambar = '';
while($rows = mysql_fetch_array($result1)){
	$gambar = $rows['gambar'];
}
//unlink($_SERVER['DOCUMENT_ROOT'].'/granesia/admin/app/picture/images/'.$gambar);

mysql_close();
//header ('Location:index.php'):''; 
$st = '1';
if($result2){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}

include ('foto_data_view.php');


?>