<?php 

//include('db.php');
// koneksi database -------------------------------------------->

//<--------------------------------------------------------------

empty( $file ) ? header('location:../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if($_SESSION['role_id']=='1'){?>
		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel2.php";?>
			</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabelgaji&folder=gaji_pokok&file=gapok_data_view"> <i class="icon icon-arrow-left"></i> Back</a>
				<h3>Input Gaji Pokok</h3>
				<form action="index.php?tab=datatabelgaji&folder=gaji_pokok&file=gapok_act_insert" method="post" id="form_insert" name="form_insert">
		
					<div class="control-group">
						<label for="gaji_pokok">Golongan : </label>
						<div class="controls">		
								<select name="id_gol" onChange='javascript:dinamis(this)'> <option value=''>- Golongan -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM t_golongan");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_gol]>$data[nama_gol]</option>";
										}
									?>
								</select>
						</div>
					</div>
					<div class="control-group">
						<label for="gaji_pokok">Gaji Pokok : </label>
						<div class="controls">
							<input type="text" name="gapok" id="gapok" placeholder="Gaji Pokok" maxlength="20" required/>
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

  <?php
  } else {
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
	}	
	?>            

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}


