<?php
$gambar = '';
//include ('db.php');
$id_gallery = $_POST['id_gallery'];
//$tanggal = $_POST['tanggal'];

$keterangan = $_POST['keterangan'];

$gambar_name = $_POST['gambar'];

if(!$_FILES['gambar']['error']){
	$gambar = basename($_FILES['gambar']['name'], ".jpg"); 
	if($gambar == ''){
		$gambar = $gambar_name;
	}
	else {
		define ('SITE_ROOT', realpath(dirname(__FILE__)));
		$gambar = preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
		move_uploaded_file($_FILES['gambar']['tmp_name'],SITE_ROOT."\images\\".$gambar);
	}
}else{
	$gambar = $gambar_name;
}



$query = "UPDATE picture SET  gambar='".$gambar."',keterangan='".$keterangan."'
		WHERE id_gallery='".$id_gallery."'";
$result = mysql_query($query) or die(mysql_error());


mysql_close();

if ($result) {
$st = '1';
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
include ('picture_data_view.php');
} else {
	include ('picture_show_view.php');
}
?>