<?php
//include ('../../db.php');
//include ('../../config.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
$id_status = $_POST['id_status'];
//$no_ktp = $_POST['no_ktp']; 
//$index = $_POST['id_karyawan']; 
$t_status = $_POST['t_status']; 
$d_status = $_POST['d_status']; 

$query = "UPDATE status_karyawan SET t_status = '".$t_status."', d_status = '".$d_status."' WHERE status_karyawan.id_status = '".$id_status."' ";

//UPDATE `granesia2`.`pendidikan` SET `id_karyawan` = '5', `t_pdk` = '2002-2009', `d_pdk` = 'oyooopites' WHERE `pendidikan`.`idp` = 66;

$result = mysql_query($query) or die(mysql_error());


$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
//$st = '1';
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=relasikerja&index=$index';
</script>";

?>