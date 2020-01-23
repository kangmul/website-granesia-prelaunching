<?php empty( $f ) ? header('location:../index.php') : '' ;

// koneksi database -------------------------------------------->
include('../db.php');
//<--------------------------------------------------------------



	if(isset($_SESSION['level'])=='1'){ 
	
	 include "app/admin.php";?>
			<div class="col-sm-10">
			
					
				
				  <div class="col-sm-12">
					<div class="alert alert-success">Selamat datang di Menu Super Admin</div>
				</div>
			

            
	
	<?php 
}
else{
	echo '<div class="alert alert-error"> Maaf Anda Harus Login Super Admin terlebih dahulu untuk mengakses halaman ini </div>';
}
?>