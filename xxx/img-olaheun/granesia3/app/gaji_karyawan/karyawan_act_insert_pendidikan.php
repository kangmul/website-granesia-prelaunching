<?php
//include ('../../db.php');
//include ('../../config.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
//$no_ktp = $_POST['no_ktp']; 
//$index = $_POST['id_karyawan']; 
$t_pdk = $_POST['t_pdk']; 
$d_pdk = $_POST['d_pdk']; 

$query = "INSERT INTO pendidikan (idp,id_karyawan,t_pdk,d_pdk) VALUES (NULL , '".$index."','".$t_pdk."','".$d_pdk."')";
$result = mysql_query($query) or die(mysql_error());


$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
//$st = '1';
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=profil&index=$index';
</script>";

?>