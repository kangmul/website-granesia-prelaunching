<?php 
// koneksi database -------------------------------------------->
//include('db.php');
//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<? if($_SESSION['role_id']=='1'){?>

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
        
			<div class="span9">
		
				<a class="btn btn-success" href="index.php?folder=slide_show&file=slide_show_view"> <i class="icon icon-arrow-left"></i> Back</a>

				<br />
				<br />
				<form action="index.php?tab=datatabel&folder=slide_show&file=slideshow_act_insert" method="post" id="form_insert" name="form_insert" enctype="multipart/form-data" >
					
					<h3>Input Slide Show</h3>
					
					<div class="control-group">
						 <tr>
                            <td><label>Gambar : </label></td>
							<p>(Ukuran Lebar: 960px Tinggi:360px)</p>
                            <td>
								<input type="file" name="gambar" id="gambar" maxlength="100" required/>							</td>
                          </tr>
						   
						  <tr>
						  <br>
						   </br>
                            <td><label>Keterangan : </label></td>
							
                            <td>
								<input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" maxlength="100" required/>							</td>
                          </tr>
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