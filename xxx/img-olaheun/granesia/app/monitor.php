<?php empty( $f ) ? header('location:../index.php') : '' ; 
if((isset($_SESSION['level']))==1){
	$f = 'monitor_form_view.php';
	$fol = 'monitor';
	
	include('monitor/monitor_form_view.php');

	}
	else
	{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>