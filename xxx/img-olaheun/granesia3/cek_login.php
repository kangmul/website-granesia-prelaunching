<?php
session_start();

// koneksi database -------------------------------------------->
include('db.php');
//<--------------------------------------------------------------

if(isset($_POST['username']) && ($_POST['password'])){
	 $username = $db->real_escape_string($_POST['username']);
	 $password = $db->real_escape_string(md5($_POST['password']));
	 //$status = $db->real_escape_string($_POST['status']);
	 
	 $sql = "select * from user where username = '$username' AND password = '$password' AND status = 'aktif'";
	 $result = $db->query($sql) or die('Terjadi Kesalahan : '.$db->error);
	
	if ($result->num_rows == 1){
		  $row = $result->fetch_assoc();
		  $_SESSION['username'] = $row['username'];
		  $_SESSION['nama'] = $row['nama'];
		  $_SESSION['level'] = $row['level'];
		  $_SESSION['index'] = $row['no'];
		  $_SESSION['jabatan'] = $row['jabatan'];
		  $_SESSION['role_id'] = $row['role_id'];
		 
		  $_SESSION['pesan'] = '<p><div class="alert alert-success">Selamat datang <b>'.$_SESSION['nama'].'</b></div></p>';
		  
		  if($_SESSION['role_id'] == '1'){
			//cek jumlah history, jika lebih dari 800 maka hapus data.
			  $sql = "SELECT id_his FROM history ";
			  $hasil = mysql_query($sql) or die(mysql_error());
			  $jum_his = mysql_num_rows($hasil);
			  if($jum_his > 800){
				$lebih_his = $jum_his - 800;
				$sql ="SELECT id_his FROM history LIMIT 0,$lebih_his";
				$hasil = mysql_query($sql) or die(mysql_error());
				
				//Lakukan PRoses penghapusan
				$count = 0;
				$i = 1;
				while($row = mysql_fetch_array($hasil)){
					$id_his = $row['id_his'];
					$sql_hapus = "DELETE FROM history WHERE id_his = '$id_his'";
					if(mysql_query($sql_hapus)){
						$count += $i;
					}
				}
			  }
		  }
		  header("location:index.php");
	}
	else{
		$_SESSION['error']="Username atau Password salah";
		header("location:index.php");
	}
}else{
	//jika tidak menggunakan html5 ( 'required' pada form login )
	//pesan ini akan muncul
	$_SESSION['error']="Username atau password tidak boleh kosong"; 
	header("location:index.php");
}
?>