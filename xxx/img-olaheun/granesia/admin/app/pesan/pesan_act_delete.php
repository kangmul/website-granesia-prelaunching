<?php
include ('db.php');
isset($_GET['id_shoutbox']) ? $id_shoutbox = $_GET['id_shoutbox'] : $id_shoutbox ='' ;

$query = "DELETE FROM shoutbox WHERE id_shoutbox='".$id_shoutbox."'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();
if($id_shoutbox != ''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}
$st = '1';
include ('pesan_form_view.php');


?>