<?php
//include ('db.php');
$gambar = '';
isset($_POST['id_gallery']) ? $id_gallery = $_POST['id_gallery'] : $id_gallery = '';

$gambar_name = $_POST['gambar_before'];

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

$keterangan = $_POST['keterangan'];
$query = "UPDATE tools_gallery SET  gambar='".$gambar."',keterangan='".$keterangan."'
		WHERE id_gallery='".$id_gallery."'";
$result = mysql_query($query) or die(mysql_error());


mysql_close();

if ($result) {
$st = '1';
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';

include ('slide_show_view.php');

	
} else {
	$st = '1';
	include ('slide_show_view.php');
}
?>