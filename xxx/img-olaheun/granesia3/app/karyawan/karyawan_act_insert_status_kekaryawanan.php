<?php
//include ('../../db.php');
//include ('../../config.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
//$no_ktp = $_POST['no_ktp']; 
//$index = $_POST['id_karyawan']; 
$t_status = $_POST['t_status']; 
$d_status = $_POST['d_status']; 

$query = "INSERT INTO status_karyawan (id_status,id_karyawan,t_status,d_status) VALUES (NULL , '".$index."','".$t_status."','".$d_status."')";
$result = mysql_query($query) or die(mysql_error());


$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
//$st = '1';
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=relasikerja&index=$index';
</script>";

?>