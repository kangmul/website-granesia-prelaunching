<?php

//include ('db.php');

$id_link = $_POST['id_link'];
$tag_link= $_POST['tag_link'];
$nama_link= $_POST['nama_link'];

$query = "UPDATE link_terkait SET tag_link='".$tag_link."',nama_link='".$nama_link."'
		WHERE id_link='".$id_link."'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();

if ($result) {

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
$st = '1';
include ('linkterkait_data_view.php');

	
} else {
	$st = '1';
	include ('linkterkait_data_view.php');
}
?>