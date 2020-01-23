<?php 
// koneksi database -------------------------------------------->
//include('db.php');
//<--------------------------------------------------------------

empty( $file ) ? header('location:../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>
	
<? if($_SESSION['role_id']=='1'){?>

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=pemegang_kontrak&file=pemegang_kontrak_data_view"> <i class="icon icon-arrow-left"></i> Back</a>
				<h3>Input Pemegang Kontrak</h3>
				<form action="index.php?tab=datatabel&folder=pemegang_kontrak&file=pemegang_act_insert" method="post" id="form_insert" name="form_insert">
					
					<div class="control-group">
						<label for="password">Pemegang Kontrak : </label>
						<div class="controls">
							<input type="text" name="pemegang" id="pemegang" placeholder="pemegang" maxlength="20" required/>
						</div>
					</div>
					
					<?
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>

					<div class="control-group">
						<button type="submit" class="btn btn-primary">
							<i class="icon icon-plus"></i> Simpan
						</button>
						<button type="reset" class="btn btn-warning">
							<i class="icon icon-refresh"></i> Batal
						</button>
					</div>
				</form>
			</div>
		</div>
<?}  
else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>
		

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>

