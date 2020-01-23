<?php 
include('db.php');
// koneksi database -------------------------------------------->

//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if(check_user("karyawan","insert",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
<?php
	if(isset($_SESSION['pesan'])){
		echo $_SESSION['pesan'];
		unset($_SESSION['pesan']);
							}
?>
 <h3>Upload Sertifikat</h3>
    <div class="container">
		
		<form action="app/karyawan/sertifikat_act_insert.php?index=<?php echo $_SESSION['id_tkjp_last']; ?>" class="dropzone">
		</form>
					
	</div>
<a class="btn btn-succes"" href="index.php?tab=datakaryawan&folder=karyawan&file=unset_last_id"> <i class="icon icon-arrow-right"></i> Berikutnya</a>
            
<?php } ?>
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>
