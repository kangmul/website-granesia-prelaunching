<?php
include ('db.php');

$id = $_POST['id'];
//$tanggal = $_POST['tanggal'];

$gambar = '';
$gambar_name = '';
//$gambar = $_POST['gambar'];
$gambar = $_FILES['gambar']['name'];
$jenis_foto=$_FILES['gambar']['type'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar = preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
$uploaddir='./app/resensi/files/';
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
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$uraian = $_POST['uraian'];

$query = "UPDATE resensi SET  gambar='".$gambar."',url='".$url."',keterangan='".$keterangan."',pengarang='".$pengarang."',penerbit='".$penerbit."',uraian='".$uraian."'
		WHERE id='".$id."'";
$result = mysql_query($query) or die(mysql_error());


mysql_close();

if ($result) {
$st = '1';
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
include ('resensi_form_view.php');
} else {
	include ('resensi_form_view.php');
}
?>