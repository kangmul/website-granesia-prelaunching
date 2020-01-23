<?php
//include ('db.php');

isset($_GET['no'])? $no = $_GET['no'] : $no ='';

//$no = $_GET['no'];

$query = "DELETE FROM user WHERE no='".$no."'";
$result = mysql_query($query) or die(mysql_error());

	mysql_close();
	if($no !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
	}
	$st = '1';
	include ('user_form_view.php');
?>