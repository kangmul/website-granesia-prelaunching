<?php
//include('db.php');

$jenis_foto=$_FILES['gambar']['type'];
$tmp_name=$_FILES['gambar']['tmp_name'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar= preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
define ('SITE_ROOT', realpath(dirname(__FILE__)));
move_uploaded_file($tmp_name, SITE_ROOT."\images\\".$gambar);

//$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];

$query = "INSERT INTO picture (gambar,keterangan) 
VALUES('$gambar','$keterangan')";
$result = mysql_query($query);

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
$st = '1';
include ('picture_form_insert.php');


?>