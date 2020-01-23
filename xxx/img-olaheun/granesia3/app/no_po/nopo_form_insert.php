<?php 

// koneksi database -------------------------------------------->
//include('db.php');
//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>
<?if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}?>
<? if($_SESSION['role_id']=='1'){?>
		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=no_po&file=nopo_data_view"> <i class="icon icon-arrow-left"></i> Back</a>
					<h3>Input NO PO</h3>
				<form action="index.php?tab=datatabel&folder=no_po&file=nopo_act_insert" method="post" id="form_insert" name="form_insert">
						<label class="label" for="klasifikasi">NO.PO</label>
					<div class="control-group">
						
							<input type="text" name="no_po" placeholder="No. PO" maxlength="20" required/>
						</div>
						
						<label class="label" for="klasifikasi">Judul Kontrak</label>
						<div class="control-group">
							<input type="text" name="judul_kontrak" placeholder="Judul Kontrak" required/>
						</div>
						
						
					<label class="label">Perusahaan</label>
					<div class="control-group">
						
						<select name="id_perusahaan" onChange='javascript:dinamis(this)' required> <option value=''>- PERUSAHAAN -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM perusahaan");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_perusahaan]>$data[nm_perusahaan]</option>";
										}
									?>
						</select>
					</div>
					
					<label class="label">Pemegang Kontrak</label>
					<div class="control-group">
						
						<select name="id_fpemegang_kontrak" onChange='javascript:dinamis(this)' required> <option value=''>- PEMEGANG KONTRAK -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM fpemegang_kontrak");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id]>$data[fungsi]</option>";
										}
									?>
						</select>
					</div>

								
						<label class="label"> AWAL KONTRAK  </label>
								
						<div class="control-group">
					
					<input type="text" name="awal_kontrak" id="tgl_mulai" placeholder="AWAL KONTRAK MULAI" maxlength="100"/>
								<!-- Load jQuery and bootstrap datepicker scripts -->
									<script src="asset/js/jquery.min.js"></script>
									<script src="asset/js/bootstrap-datepicker.js"></script>
									<script type="text/javascript">
										// When the document is ready
										$(document).ready(function () {
									
											$('#tgl_mulai').datepicker({
												format: "yyyy-mm-dd"
											});  
								
										});
									</script>
						</div>
						
						<label class="label">AKHIR KONTRAK </label>
	<div class="control-group">
										
					<input type="text" name="ahir_kontrak" id="tgl_selesai" placeholder="BERAKHIR KONTRAK" maxlength="100"/>
								<!-- Load jQuery and bootstrap datepicker scripts -->
									<script src="asset/js/jquery.min.js"></script>
									<script src="asset/js/bootstrap-datepicker.js"></script>
									<script type="text/javascript">
										// When the document is ready
										$(document).ready(function () {
											$('#tgl_selesai').datepicker({
												format: "yyyy-mm-dd"
											});  
										});
									</script>
						</div>
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