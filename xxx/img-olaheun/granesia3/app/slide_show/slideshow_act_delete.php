<?php
//include ('db.php');
isset($_GET['id_gallery'])?$id_gallery = $_GET['id_gallery'] : $id_gallery ='';

$query1 = "SELECT * FROM tools_gallery WHERE id_gallery='".$id_gallery."'";
$query2 = "DELETE FROM tools_gallery WHERE id_gallery='".$id_gallery."'";

$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());


//hapus gambar
$gambar = '';
while($rows = mysql_fetch_array($result1)){
	$gambar = $rows['gambar'];
}
unlink($_SERVER['DOCUMENT_ROOT'].'/pertamina/app/slide_Show/images/'.$gambar);

mysql_close();
if($result2){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}

$st = '1';
include ('slide_show_view.php');


?>