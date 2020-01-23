<?php
include ('db.php');

//$gambar = '';
//include ('db.php');
$id = $_POST['id'];
//$tanggal = $_POST['tanggal'];

$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];

//$gambar_name = $_POST['gambar'];

$gambar_name = '';

$gambar = $_FILES['gambar']['name'];
$jenis_foto=$_FILES['gambar']['type'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar = preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
//$gambar = $_POST['gambar'];
$uploaddir='./app/foto/files/';
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


$query = "UPDATE foto SET  gambar='".$gambar."',url='".$url."',judul='".$judul."',keterangan='".$keterangan."'
		WHERE id='".$id."'";
$result = mysql_query($query) or die(mysql_error());


mysql_close();

if ($result) {
$st = '1';
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
include ('foto_data_view.php');
} else {
	include ('foto_update_form.php');
}
?>