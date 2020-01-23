<?php empty( $f ) ? header('location:../index.php') : '' ;
if(isset($_SESSION['level'])){?>
<?php 
	//role_id diambil dari database -> 1=superadmin, 2 = adm_jtb
	if(isset($_SESSION['level'])){ ?>

			<?php include "app/menudata.php";?>
					
				
				  <div class="col-sm-10">
					<div class="alert alert-success">Selamat datang di Menu Super Admin</div>
				</div>
			

            
	<?php } ?>
	<?php 
}
else{
	echo '<div class="alert alert-error"> Maaf Anda Harus Login Super Admin terlebih dahulu untuk mengakses halaman ini </div>';
}
?>