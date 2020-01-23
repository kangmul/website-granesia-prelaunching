<?php
session_start();
// apabila ditekan tombol logout, session username & level akan hilang 
unset($_SESSION['username']);
unset($_SESSION['nama']);
unset($_SESSION['level']);
unset($_SESSION['index']);
unset($_SESSION['role_id']);
header("location:index.php?app=login");
?>
