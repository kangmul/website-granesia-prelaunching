<?php empty( $file ) ? header('location:../index.php') : '' ; 
if(isset($_SESSION['role_id'])){
	$file = 'user_form_view.php';
	$folder = 'user';
	
	include('user/user_form_view.php');

	}
	else
	{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>