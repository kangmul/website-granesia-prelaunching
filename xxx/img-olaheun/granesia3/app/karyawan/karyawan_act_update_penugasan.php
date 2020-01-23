<?php
//include ('../../db.php');
//include ('../../config.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
$id_penugasan = $_POST['id_penugasan'];
//$no_ktp = $_POST['no_ktp']; 
//$index = $_POST['id_karyawan']; 
$t_penugasan = $_POST['t_penugasan']; 
$d_penugasan = $_POST['d_penugasan']; 

$query = "UPDATE penugasan SET t_penugasan = '".$t_penugasan."', d_penugasan = '".$d_penugasan."' WHERE penugasan.id_penugasan = '".$id_penugasan."' ";

//UPDATE `granesia2`.`pendidikan` SET `id_karyawan` = '5', `t_pdk` = '2002-2009', `d_pdk` = 'oyooopites' WHERE `pendidikan`.`idp` = 66;

$result = mysql_query($query) or die(mysql_error());


$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
//$st = '1';
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=relasikerja&index=$index';
</script>";

?>