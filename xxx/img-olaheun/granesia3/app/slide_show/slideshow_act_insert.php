<?php
//include('db.php');
isset($_POST['id_gallery']) ? $id_gallery = $_POST['id_gallery'] : $id_gallery = '';
$keterangan = $_POST['keterangan'];

$jenis_foto=$_FILES['gambar']['type'];
$tmp_name=$_FILES['gambar']['tmp_name'];
$gambar = basename($_FILES['gambar']['name'], ".jpg");
$gambar= preg_replace("/[^A-Za-z0-9_-]/", "", $gambar).".jpg";
define ('SITE_ROOT', realpath(dirname(__FILE__)));
move_uploaded_file($tmp_name, SITE_ROOT."\images\\".$gambar);



$query_validasi = "SELECT * FROM tools_gallery WHERE id_gallery='".$id_gallery."'";
$result_validasi = mysql_query($query_validasi);

$query_validasi_final = mysql_fetch_array($result_validasi);
echo $query_validasi_final['id_gallery'];




if ($query_validasi_final['id_gallery']!="") {
echo "<script>alert('Data sudah ada!');
		</script>";
		
} else if ($query_validasi_final['id_gallery']=="") {

$query = "INSERT INTO tools_gallery (id_gallery,gambar,keterangan) 
VALUES('$id_gallery','$gambar','$keterangan')";
$result = mysql_query($query);

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
$st = '1';
include ('slideshow_form_insert.php');

}
?>