<?php empty( $f ) ? header('location:../index.php') : '' ; 
if((isset($_SESSION['level']))==1){
	echo "<script>;
		location.href='index.php?t=datauser&fol=users&f=user_form_view';
		</script>";

	}
	else
	{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>