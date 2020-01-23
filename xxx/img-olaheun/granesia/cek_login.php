<?php
session_start();

// koneksi database -------------------------------------------->
include('db.php');
//<--------------------------------------------------------------

if(isset($_POST['username']) && ($_POST['password'])){
	 $username = $db->real_escape_string($_POST['username']);
	 $password = $db->real_escape_string(md5($_POST['password']));
	 //$status = $db->real_escape_string($_POST['status']);
	 
	 $sql = "select * from user where username = '$username' AND password = '$password' AND status = 'Y'";
	 $result = $db->query($sql) or die('Terjadi Kesalahan : '.$db->error);
	
	if ($result->num_rows == 1){
		  $row = $result->fetch_assoc();
		  $_SESSION['username'] = $row['username'];
		  $_SESSION['nama'] = $row['nama'];
		  $_SESSION['level'] = $row['level'];
		  $_SESSION['id'] = $row['id'];
		  header("location:index.php?t=home&f=home");
		  $_SESSION['pesan'] = '<p><div class="alert alert-success">Selamat datang <b>'.$_SESSION['nama'].'</b>
		  </div></p>';
		  
			
	}
	else{
		$_SESSION['error']="Username atau Password salah";
		  header("location:index.php?f=login");
	}
}else{
	//jika tidak menggunakan html5 ( 'required' pada form login )
	//pesan ini akan muncul
	$_SESSION['error']="Username atau password tidak boleh kosong"; 
	header("location:index.php");
}
?>
