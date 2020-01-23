<?php 

//include('db.php');
// koneksi database -------------------------------------------->

//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>
	
<? if($_SESSION['role_id']=='1'){?>

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
        	</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=perusahaan&file=perusahaan_data_view"> <i class="icon icon-arrow-left"></i> Back</a>

					<h3>Input PPJP</h3>
				<form action="index.php?tab=datatabel&folder=perusahaan&file=perusahaan_act_insert" method="post" id="form_insert" name="form_insert">
					
					<div class="control-group">
						
						<div class="controls">
							Nama Perusahaan: </br>
							<input class="input-block-level" style=" width:400px;" type="text" name="nm_perusahaan" id="nm_perusahaan" placeholder="Nama Perusahaan" maxlength="10" required/></br>
							No Kontak: </br>
							<input class="input-block-level" style=" width:200px;" type="text" name="no_telepon" id="no_telepon" placeholder="No Telepon" maxlength="30" required/>
							<input class="input-block-level" style=" width:200px;" type="text" name="fax" id="fax" placeholder="Fax" maxlength="30" required/>
							<input class="input-block-level" style=" width:200px;" type="text" name="no_hp" id="no_hp" placeholder="No HP" maxlength="30" required/></br>
							Email: </br>
							<input class="input-block-level" style=" width:300px;" type="text" name="email" id="email" placeholder="Email" maxlength="30" required/></br>
							Alamat: </br>
							<input class="input-block-level" style=" width:400px;" type="text" name="alamat" id="nm_perusahaan" placeholder="Jalan" maxlength="200" required/>
							<input class="input-block-level" style=" width:200px;" type="text" name="kota" id="kota" placeholder="Kota" maxlength="50" required/>
							<input class="input-block-level" style=" width:200px;" type="text" name="kode_pos" id="kode_pos" placeholder="Kode Pos" maxlength="50" required/>
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

