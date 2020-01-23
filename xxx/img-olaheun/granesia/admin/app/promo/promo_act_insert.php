<?php
include('db.php');

//$id = $_POST['id'];

$keterangan = $_POST['keterangan'];
$uraian = $_POST['uraian'];

$gambar = $_FILES['gambar']['name'];
$gambar = "";

$jenis_foto=$_FILES['gambar']['type'];
//$tmp_name=$_FILES['gambar']['tmp_name'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar= preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
//define ('SITE_ROOT', realpath(dirname(__FILE__)));
$uploaddir='./app/promo/files/';
$url=$uploaddir.$gambar;
		
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$url))
		{
			
			
			//catat data file yang berhasil di upload
			$query = "INSERT INTO promo (id,gambar,url,keterangan,uraian) 
			VALUES('','$gambar','$url','$keterangan','$uraian')";
			$result = mysql_query($query);
		
		}
		else {
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}



$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
$st = '1';
include ('promo_form_view.php');


?>