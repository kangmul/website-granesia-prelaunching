<?php
//include ('../../db.php');
//include ('../../config.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
$idp = $_POST['idp'];
//$no_ktp = $_POST['no_ktp']; 
//$index = $_POST['id_karyawan']; 
$t_pdk = $_POST['t_pdk']; 
$d_pdk = $_POST['d_pdk']; 

$query = "UPDATE pendidikan SET t_pdk = '".$t_pdk."', d_pdk = '".$d_pdk."' WHERE pendidikan.idp = '".$idp."' ";

//UPDATE `granesia2`.`pendidikan` SET `id_karyawan` = '5', `t_pdk` = '2002-2009', `d_pdk` = 'oyooopites' WHERE `pendidikan`.`idp` = 66;

$result = mysql_query($query) or die(mysql_error());


$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
//$st = '1';
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=profil&index=$index';
</script>";

?>