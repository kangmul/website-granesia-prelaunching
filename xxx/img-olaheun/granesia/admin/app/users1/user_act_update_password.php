<?php

include ('db.php');

$uid = isset($_POST['uid']) ? $_POST['uid'] : null;
$password_baru = isset($_POST['password_baru']) ? $_POST['password_baru'] : null;

$password = md5($password_baru);

/*
echo "id : ".$id."</br>"; 
echo "password : ".$password_baru."</br>"; 
echo "password md 5 : ".$password."</br>"; 

die();
*/

$query = "UPDATE user set password = '".$password."'
	WHERE user.uid ='".$uid."'";
		
$result = mysql_query($query) or die(mysql_error());
mysql_close();
if ($result > 0) {
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>Berhasil Di Update</b> </b></div></p>';

	echo "<script>;
		location.href='index.php?t=$t&p=$p&f=view_user';
		</script>";
} else {
	echo "<script>;
		location.href='index.php?t=$t&p=$p&f=view_user';
		</script>";
}
?>