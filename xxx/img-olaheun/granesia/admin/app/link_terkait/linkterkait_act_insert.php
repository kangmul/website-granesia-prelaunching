<?php
include('db.php');

//$id_link = $_POST['id_link'];
$tag_link = $_POST['tag_link'];
$nama_link = $_POST['nama_link'];

$gambar = $_FILES['gambar']['name'];
$gambar = "";

$jenis_foto=$_FILES['gambar']['type'];
//$tmp_name=$_FILES['gambar']['tmp_name'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar= preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
//define ('SITE_ROOT', realpath(dirname(__FILE__)));
$uploaddir='./app/link_terkait/files/';
$url=$uploaddir.$gambar;
		
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$url))
		{
			
			
			//catat data file yang berhasil di upload
			$query = "INSERT INTO link_terkait 
			(id_link,tag_link,url,nama_link,gambar) VALUES('','$tag_link','$url','$nama_link','$gambar')";
			$result = mysql_query($query);
		}
		else {
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}



$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
$st = '1';
include ('linkterkait_data_view.php');

?>