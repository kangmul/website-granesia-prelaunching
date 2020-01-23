<?php empty( $file ) ? header('location:../index.php') : '' ;
if(isset($_SESSION['level'])){?>
<?php 
	//role_id diambil dari database -> 1=superadmin, 2 = adm_jtb
	if(isset($_SESSION['role_id'])){ ?>

		
			<div class="row-fluid">
				<div class="span2">
						<?php include "app/menutabel.php";?>
				</div><!--/span-->
					
				<div class="span9">
					<div class="alert alert-success">Selamat datang di Menu Super Admin</b></div>		
				</div>
			</div>
		

            
	<?php } ?>
	<?php 
}
else{
	echo '<div class="alert alert-error"> Maaf Anda Harus Login Super Admin terlebih dahulu untuk mengakses halaman ini </div>';
}
?>