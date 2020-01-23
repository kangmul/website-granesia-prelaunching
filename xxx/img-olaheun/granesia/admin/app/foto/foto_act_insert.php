<?php
include('db.php');

//$id = $_POST['id'];
$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];

$gambar = $_FILES['gambar']['name'];
$gambar = "";

$jenis_foto=$_FILES['gambar']['type'];
//$tmp_name=$_FILES['gambar']['tmp_name'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar= preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
//define ('SITE_ROOT', realpath(dirname(__FILE__)));
$uploaddir='./app/foto/files/';
$url=$uploaddir.$gambar;
		
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$url))
		{
			
			
			$query = "INSERT INTO foto (id,gambar,url,judul,keterangan) 
			VALUES('','$gambar','$url','$judul','$keterangan')";
			$result = mysql_query($query);
		}
		else {
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}






$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
$st = '1';
include ('foto_data_view.php');


?>