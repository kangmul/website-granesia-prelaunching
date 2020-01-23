<?php
//include ('db.php');
if(isset($_POST['nm_field'])){

	$id_field = $_POST['id_field'];
	$nm_field = $_POST['nm_field'];

	$query1 = "SELECT * FROM field WHERE id_field='".$id_field."'";
	$query2 = "UPDATE field SET nm_field='$nm_field' WHERE id_field='$id_field'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());
	
	//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$field_awal = $rows['nm_field'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$field_awal."</p>";
		$data_akhir = "<p>: ".$nm_field."</p>";
		$modul = "field";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);


	mysql_close();


	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil dirubah</b> </b></div></p>';

	if ($result2) {
		$st = '1';
		include('field_form_view.php');
	} else {
		$st = '1';
		include('field_form_view.php');
	}
}
?>