<?php
//include('db.php');

if(isset($_POST['no_po'])){
	$no_po = $_POST['no_po'];
	$judul_kontrak = $_POST['judul_kontrak'];
	$id_perusahaan = $_POST['id_perusahaan'];
	$id_fpemegang_kontrak = $_POST['id_fpemegang_kontrak'];
	$awal_kontrak = $_POST['awal_kontrak'];
	$ahir_kontrak = $_POST['ahir_kontrak'];

	$query_validasi = "SELECT * FROM no_po WHERE no_po='".$no_po."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);

	if ($query_validasi_final['no_po']!="") {
	echo "<script>alert('Data sudah ada!');
			</script>";
			
	} else if ($query_validasi_final['no_po']=="") {

	$query = "INSERT INTO no_po(no_po,judul_kontrak,id_perusahaan,id_fpemegang_kontrak,awal_kontrak,ahir_kontrak) 
			VALUES('".$no_po."','".$judul_kontrak."','".$id_perusahaan."','".$id_fpemegang_kontrak."','".$awal_kontrak."','".$ahir_kontrak."')";
	$result = mysql_query($query);
	
	///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "no_po : ".$no_po;
		$modul = "no_po";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);
		
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
	}
	$st = '1';
	include ('nopo_form_insert.php');
}

?>