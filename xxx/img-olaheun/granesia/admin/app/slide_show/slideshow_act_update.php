<?php
include ('db.php');


$id = $_POST['id'];

$gambar = '';
$gambar_name = '';
//$gambar = $_POST['gambar'];
$gambar = $_FILES['gambar']['name'];
$jenis_foto=$_FILES['gambar']['type'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar = preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
$uploaddir='./app/slide_show/files/';
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

$keterangan = $_POST['keterangan'];
$isi_berita = $_POST['isi_berita'];

$query = "UPDATE tools_gallery SET  gambar='".$gambar."',url='".$url."',keterangan='".$keterangan."',isi_berita='".$isi_berita."'
		WHERE id='".$id."'";
$result = mysql_query($query) or die(mysql_error());


mysql_close();

if ($result > 0) {

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>Berhasil Di Update</b> </b></div></p>';

include ('slide_show_view.php');

	
} else {
	include ('slide_show_view.php');
}
?>