<?php
include ('db.php');
//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

$password = '';
if($password1 == $password2){
	$password = md5($password1);

	$country = $_POST['country'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$gid = $_POST['gid'];
	$status= $_POST['status']; 
	$su= $_POST['su']; 



	$query_validasi = "SELECT * FROM user WHERE email='".$email."' AND password = '".$password."'";

	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);

	if ($query_validasi_final['email']!="" && $query_validasi_final['password']!="") {

	echo "<script>alert('User sudah ada!');
			location.href='index.php?t=$t&p=$p&f=view_user';
			</script>";
			
	} 
	
	else if ($query_validasi_final['email']=="" && $query_validasi_final['password']=="") {
								
	

	$query = "INSERT INTO user (uid,country,email,password,first_name,last_name,gid,status,su) 
	VALUES ('','".$country."','".$email."','".$password."','".$first_name."','".$last_name."','".$gid."'
	,'".$status."','".$su."')";

	$result = mysql_query($query)or die();

	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan </b></div></p>';
	
	echo "<script>;
		location.href='index.php?t=$t&p=$p&f=view_user';
		</script>";
	
	}
}
else{

	echo "<script>alert('Password yang dimasukan tidak cocok !');
		location.href='index.php?p=users&f=view_user&pass=tidakcocok';
		</script>";
}
?>