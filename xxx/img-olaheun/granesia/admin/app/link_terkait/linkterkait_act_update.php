<?php

include ('db.php');

$gambar_name = '';
isset($_POST['id_link']) ? $id_link = $_POST['id_link'] : $id_link = '';
$gambar = $_FILES['gambar']['name'];
$jenis_foto=$_FILES['gambar']['type'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar = preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
//$gambar = $_POST['gambar'];
$uploaddir='./app/link_terkait/files/';
$url=$uploaddir.$gambar;

if(!$_FILES['gambar']['error']){
	$gambar = basename($_FILES['gambar']['name'], ".jpg"); 
	if($gambar == ''){
		$gambar = $gambar_name;
	}
	else {
		//define ('SITE_ROOT', realpath(dirname(__FILE__)));
		
		move_uploaded_file($_FILES['gambar']['tmp_name'],$url);
	}
}else{
	$gambar = $gambar_name;
}

$tag_link= $_POST['tag_link'];
$nama_link= $_POST['nama_link'];

$query = "UPDATE link_terkait SET tag_link='".$tag_link."',nama_link='".$nama_link."',url='".$url."',gambar='".$gambar."'
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