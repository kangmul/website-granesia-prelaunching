<?php
include('db.php');

//$id = $_POST['id'];
$keterangan = $_POST['keterangan'];
$isi_berita = $_POST['isi_berita'];

$gambar = $_FILES['gambar']['name'];
$gambar = "";

$jenis_foto=$_FILES['gambar']['type'];
//$tmp_name=$_FILES['gambar']['tmp_name'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar= preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
//define ('SITE_ROOT', realpath(dirname(__FILE__)));
$uploaddir='./app/slide_show/files/';
$url=$uploaddir.$gambar;
		
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$url))
		{
			
			
			$query = "INSERT INTO tools_gallery (id,gambar,url,keterangan,isi_berita) 
			VALUES('','$gambar','$url','$keterangan','$isi_berita')";
			$result = mysql_query($query);
		}
		else {
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}




//header('Location:user_form_insert.php?konfirmasi=1');

//header ('Location:index.php'):''; 
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan</b> </b></div></p>';

include ('slide_show_view.php');


?>