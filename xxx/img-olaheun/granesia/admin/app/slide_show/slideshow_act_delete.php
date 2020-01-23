<?php
include ('db.php');

$id = $_GET['id'];

$query = "SELECT  * FROM tools_gallery WHERE id='".$id."'";
$query1 = "DELETE FROM tools_gallery WHERE id='".$id."'";

$result = mysql_query($query) or die(mysql_error());
$result1 = mysql_query($query1) or die(mysql_error());


$gambar = '';
while($rows = mysql_fetch_array($result)){
	$gambar = $rows['gambar'];
}
unlink($_SERVER['DOCUMENT_ROOT'].'/granesia/admin/app/slide_show/images/'.$gambar);


mysql_close();
//header ('Location:index.php'):''; 
$st = '1';
if($result1){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}

include ('slide_show_view.php');


?>