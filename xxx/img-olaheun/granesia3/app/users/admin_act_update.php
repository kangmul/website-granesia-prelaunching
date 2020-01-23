<?php
//include ('db.php');

$no = $_POST['no'];
$nama = $_POST['nama']; 
$username = $_POST['username']; 

if($_POST['password_baru'] != '')
		$password = md5($_POST['password_baru']); 
else 
		$password = $_POST['password_lama'];
		

$jenis_kelamin = $_POST['jenis_kelamin']; 
$email = $_POST['email']; 
$alamat = $_POST['alamat']; 
$no_kontak = $_POST['no_kontak']; 
$tgl_lahir = $_POST['tgl_lahir']; 
$tempat_lahir = $_POST['tempat_lahir']; 

isset($_POST['foto_lama'])? $foto_lama = $_POST['foto_lama'] : $foto_lama ='';

$foto = $foto_lama;
if(!$_FILES['foto']['error']){
	$fotoDirectory = "\user_foto\\";
	$jenis_foto=$_FILES['foto']['type'];
	$tmp_name=$_FILES['foto']['tmp_name'];
	$foto=$_FILES['foto']['name'];
		$rnd=date('Y-m-d');
	if($foto ==''){
		$foto = $foto_lama;
	}else{
	$foto=$rnd.'-'.$foto;
		define ('SITE_ROOT', realpath(dirname(__FILE__)));
		//imagejpeg(imagecreatefromjpeg($tmp_name, $tmp_name, 50));
		move_uploaded_file($tmp_name, SITE_ROOT.$fotoDirectory.$foto);
	}
}



$query = "UPDATE user SET username = '".$username."', password = '".$password."', nama = '".$nama."', 
	jenis_kelamin = '".$jenis_kelamin."', email = '".$email."', alamat = '".$alamat."', 
	no_kontak = '".$no_kontak."' , tgl_lahir = '".$tgl_lahir."',	tempat_lahir = '".$tempat_lahir."',
	foto = '".$foto."'
	
	WHERE user.no ='".$no."'";
		
$result = mysql_query($query) or die(mysql_error());
mysql_close();
if ($result > 0) {
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>Berhasil Di Update</b> </b></div></p>';
	$st = '1';
	include('admin_profil.php');
} else {
	$st = '1';
	include('admin_profil.php');
}
?>