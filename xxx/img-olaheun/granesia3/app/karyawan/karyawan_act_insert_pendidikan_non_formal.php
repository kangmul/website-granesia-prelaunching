<?php
//include ('../../db.php');
//include ('../../config.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
//$no_ktp = $_POST['no_ktp']; 
//$index = $_POST['id_karyawan']; 
$t_pdk_non = $_POST['t_pdk_non']; 
$d_pdk_non = $_POST['d_pdk_non']; 

$query = "INSERT INTO pdk_non_formal (idp_non,id_karyawan,t_pdk_non,d_pdk_non) VALUES (NULL , '".$index."','".$t_pdk_non."','".$d_pdk_non."')";
$result = mysql_query($query) or die(mysql_error());


$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
//$st = '1';
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=profil&index=$index';
</script>";

?>