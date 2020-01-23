<?php
//include ('db.php');

isset($_GET['nm_field'])?$nm_field = $_GET['nm_field'] : $nm_field ='';

$query1 = "SELECT * FROM field WHERE nm_field='$nm_field'";
$query2 = "DELETE FROM field WHERE nm_field='$nm_field'";

$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());

//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$field = $rows['nm_field'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$field."</p>";
		$data_akhir = " ";
		$modul = "field";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

mysql_close();
if($nm_field !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}

$st = '1';
include('field_form_view.php');


?>