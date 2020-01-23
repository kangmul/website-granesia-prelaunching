<?php
session_start();
// apabila ditekan tombol logout, session username & level akan hilang 
unset($_SESSION['username']);
unset($_SESSION['level']);
//unset($_SESSION['su']);

header("location:index.php");
?>
