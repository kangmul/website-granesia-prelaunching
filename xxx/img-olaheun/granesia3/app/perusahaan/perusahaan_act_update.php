<?php

//include ('db.php');

if(isset($_POST['nm_perusahaan']) || isset($_POST['no_telepon'])){

	isset($_POST['id_perusahaan']) ? $id_perusahaan = $_POST['id_perusahaan'] : $id_perusahaan = '';
	isset($_POST['nm_perusahaan']) ? $nm_perusahaan = $_POST['nm_perusahaan'] : $nm_perusahaan = '';
	isset($_POST['no_telepon']) ? $no_telepon = $_POST['no_telepon'] : $no_telepon = '';
	isset($_POST['fax']) ? $fax = $_POST['fax'] : $fax = '';
	isset($_POST['no_hp']) ? $no_hp = $_POST['no_hp'] : $no_hp = '';
	isset($_POST['email']) ? $email = $_POST['email'] : $email = '';
	isset($_POST['alamat']) ? $alamat = $_POST['alamat'] : $alamat = '';
	isset($_POST['kota']) ? $kota = $_POST['kota'] : $kota = '';
	isset($_POST['kode_pos']) ? $kode_pos = $_POST['kode_pos'] : $kode_pos = '';
	//isset($_POST['no_telepon']) ? $no_telepon = $_POST['no_telepon'] : $no_telepon = '';
	//isset($_POST['nm_perusahaan']) ? $nm_perusahaan = $_POST['nm_perusahaan'] : $nm_perusahaan = '';
	
	
	$query1 = "SELECT * FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
	$query2 = "UPDATE perusahaan SET nm_perusahaan='".$nm_perusahaan."',no_telepon = '".$no_telepon."',fax = '".$fax."',no_hp = '".$no_hp."',
	email = '".$email."',alamat = '".$alamat."',kota = '".$kota."',kode_pos = '".$kode_pos."' WHERE id_perusahaan='".$id_perusahaan."'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());

	//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$perusahaan_awal = $rows['nm_perusahaan'];
	$no_telepon_awal = $rows['no_telepon'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$perusahaan_awal.",".$no_telepon_awal."</p>";
		$data_akhir = "<p>: ".$nm_perusahaan.",".$no_telepon."</p>";
		$modul = "perusahaan";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);
		
	mysql_close();
	if ($result2) {
		$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Rubah</b> </b></div></p>';
	$st='1';
	include ('perusahaan_data_view.php');
	}
}
?>