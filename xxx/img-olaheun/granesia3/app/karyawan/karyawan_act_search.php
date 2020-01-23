<?php
require_once '../inc/config.php';

$username = $_POST['username'];

$query = "SELECT * FROM user WHERE username LIKE '%$username%'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();

if ($result > 0) {
	header('Location:user_form_view.php');
}
?>