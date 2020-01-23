<?php

//include ('db.php');

if(isset($_POST['no_po'])){
	$id_no_po = $_POST['id_no_po'];
	$no_po= $_POST['no_po'];
	$judul_kontrak= $_POST['judul_kontrak'];
	$id_perusahaan= $_POST['id_perusahaan'];
	$id_fpemegang_kontrak= $_POST['id_fpemegang_kontrak'];
	$awal_kontrak = $_POST['awal_kontrak'];
	$ahir_kontrak = $_POST['ahir_kontrak'];
	
	$query1 = "SELECT * FROM no_po WHERE id_no_po='".$id_no_po."'";
	$query2 = "UPDATE no_po SET no_po='".$no_po."',judul_kontrak = '".$judul_kontrak."',id_perusahaan='".$id_perusahaan."',id_fpemegang_kontrak='".$id_fpemegang_kontrak."',
				awal_kontrak = '".$awal_kontrak."',ahir_kontrak = '".$ahir_kontrak."' WHERE id_no_po='".$id_no_po."'";
				
	$query3 = "UPDATE tkjp SET id_fpemegang_kontrak='".$id_fpemegang_kontrak."' WHERE id_no_po='".$id_no_po."'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());
	$result3 = mysql_query($query3) or die(mysql_error());

	//Ambil data sebelum update
		$rows=mysql_fetch_array($result1);
		$no_po_awal = $rows['no_po'];
		$id_perusahaan_awal= $rows['id_perusahaan'];
		$id_fpemegang_kontrak_awal= $rows['id_fpemegang_kontrak'];
		$awal_kontrak_awal = $rows['awal_kontrak'];
		$ahir_kontrak_awal = $rows['ahir_kontrak'];
		//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$no_po_awal.",".$id_perusahaan_awal.",".$id_fpemegang_kontrak_awal.",".$awal_kontrak_awal.",".$ahir_kontrak_awal."</p>";
		$data_akhir = "<p>: ".$no_po.",".$id_perusahaan.",".$id_fpemegang_kontrak.",".$awal_kontrak.",".$ahir_kontrak."</p>";
		$modul = "no_po";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);	

	mysql_close();

	if ($result2 && $result3) {
		$st='1';
		$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil dirubah</b> </b></div></p>';
	} 
}
include ('nopo_data_view.php');

?>