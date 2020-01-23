<?php 

//include('db.php');
// koneksi database -------------------------------------------->

//<--------------------------------------------------------------

empty( $file ) ? header('location:../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='3')){?>
		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel2.php";?>
			</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabelgaji&folder=golongan&file=golongan_data_view"> <i class="icon icon-arrow-left"></i> Back</a>
				<h3>Input Golongan</h3>
				<form action="index.php?tab=datatabelgaji&folder=golongan&file=golongan_act_insert" method="post" id="form_insert" name="form_insert">
		
					<div class="control-group">
						<label for="nama_golongan">Nama Golongan : </label>
						<div class="controls">
							<input type="text" name="nama_gol" id="nama_gol" placeholder="Nama Golongan" maxlength="20" required/>
						</div>
						
					</div>
					<div class="control-group">
						<label for="jenis_golongan">Jenis Golongan : </label>
						<div class="controls">
							<input type="text" name="jenis_gol" id="jenis_gol" placeholder="Jenis Golongan" maxlength="20" required/>
						</div>
						
					</div>
					<div class="control-group">
						<label for="gaji_pokok">Gaji Pokok : </label>
						<div class="controls">
							<input type="text" name="gapok" id="gapok" placeholder="Gaji Pokok" maxlength="20" required/>
						</div>
						
					</div>

					<?php
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

  <?php
  } else {
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}
	?>            

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}


