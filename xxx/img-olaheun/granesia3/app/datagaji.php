<?php empty( $file ) ? header('location:../index.php') : '' ; 
if(isset($_SESSION['role_id'])){?>

<?php
	$file = 'gaji_karyawan_form_view';
	$folder = 'gaji_karyawan';
	
	include('gaji_karyawan/gaji_karyawan_form_view.php');
?>

	
	<?php 
	}
	else
	{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>