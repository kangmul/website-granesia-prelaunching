<?php
//include ('db.php');
isset($_GET['id']) ? $id = $_GET['id'] : $id ='';

$query1 = "SELECT * FROM fpemegang_kontrak WHERE id='".$id."'";
$query2 = "DELETE FROM fpemegang_kontrak WHERE id='".$id."'";

$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());

//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$fungsi = $rows['fungsi'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$fungsi."</p>";
		$data_akhir = " ";
		$modul = "Pemegang Kontrak";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

mysql_close();

if($id !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</div></p>';
}

$st = '1';
include ('pemegang_kontrak_data_view.php');


?>