<?php
//include('db.php');
$tag_link = $_POST['tag_link'];
$nama_link = $_POST['nama_link'];

$query_validasi = "SELECT * FROM link_terkait WHERE tag_link='".$tag_link."'";
$result_validasi = mysql_query($query_validasi);

$query_validasi_final = mysql_fetch_array($result_validasi);
echo $query_validasi_final['tag_link'];

if ($query_validasi_final['tag_link']!="") {
echo "<script>alert('Data sudah ada!');
		</script>";
		
} else if ($query_validasi_final['tag_link']=="") {

$query = "INSERT INTO link_terkait 
(tag_link,nama_link) VALUES('".$tag_link."','".$nama_link."')";
$result = mysql_query($query);

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
$st = '1';
include ('linkterkait_form_insert.php');

}
?>