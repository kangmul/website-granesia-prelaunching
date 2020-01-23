<?php
//include ('../../db.php');
//include ('../../config.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
$idp_non = $_POST['idp_non'];
//$no_ktp = $_POST['no_ktp']; 
//$index = $_POST['id_karyawan']; 
$t_pdk_non = $_POST['t_pdk_non']; 
$d_pdk_non = $_POST['d_pdk_non']; 

$query = "UPDATE pdk_non_formal SET t_pdk_non = '".$t_pdk_non."', d_pdk_non = '".$d_pdk_non."' WHERE pdk_non_formal.idp_non = '".$idp_non."' ";

//UPDATE `granesia2`.`pendidikan` SET `id_karyawan` = '5', `t_pdk` = '2002-2009', `d_pdk` = 'oyooopites' WHERE `pendidikan`.`idp` = 66;

$result = mysql_query($query) or die(mysql_error());


$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
//$st = '1';
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=profil&index=$index';
</script>";

?>