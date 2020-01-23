<?php
include ('db.php');
//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST


	$uid = $_POST['uid'];
	$country = $_POST['country'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$gid = $_POST['gid'];
	//$status= $_POST['status']; 
	//$su= $_POST['su']; 


	$query = "UPDATE user SET country='".$country."',first_name='".$first_name."',last_name='".$last_name."',email='".$email."',gid='".$gid."'
	WHERE uid='".$uid."'";

		$result = mysql_query($query);

	$result = mysql_query($query)or die();

	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan </b></div></p>';
	
	echo "<script>;
		location.href='index.php?t=$t&p=$p&f=view_user';
		</script>";
	
	
?>