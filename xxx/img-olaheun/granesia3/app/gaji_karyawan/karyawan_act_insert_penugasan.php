<?php
//include ('../../db.php');
//include ('../../config.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;
//$no_ktp = $_POST['no_ktp']; 
//$index = $_POST['id_karyawan']; 
$t_penugasan = $_POST['t_penugasan']; 
$d_penugasan = $_POST['d_penugasan']; 

$query = "INSERT INTO penugasan (id_penugasan,id_karyawan,t_penugasan,d_penugasan) VALUES (NULL , '".$index."','".$t_penugasan."','".$d_penugasan."')";
$result = mysql_query($query) or die(mysql_error());


$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
//$st = '1';
echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=relasikerja&index=$index';
</script>";

?>