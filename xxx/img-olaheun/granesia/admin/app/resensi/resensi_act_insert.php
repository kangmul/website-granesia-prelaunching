<?php
include('db.php');

//$id = $_POST['id'];

$keterangan = $_POST['keterangan'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$uraian = $_POST['uraian'];

$gambar = $_FILES['gambar']['name'];
$gambar = "";

$jenis_foto=$_FILES['gambar']['type'];
//$tmp_name=$_FILES['gambar']['tmp_name'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar= preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
//define ('SITE_ROOT', realpath(dirname(__FILE__)));
$uploaddir='./app/resensi/files/';
$url=$uploaddir.$gambar;
		
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$url))
		{
			
			
			//catat data file yang berhasil di upload
		$query = "INSERT INTO resensi (id,gambar,url,keterangan,pengarang,penerbit,uraian) 
		VALUES('','$gambar','$url','$keterangan','$pengarang','$penerbit','$uraian')";
		$result = mysql_query($query);
		
		}
		else {
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
$st = '1';
include ('resensi_form_view.php');


?>