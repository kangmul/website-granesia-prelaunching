<?php
//include ('db.php');

$id_no_po = isset($_GET['id_no_po']) ? $_GET['id_no_po'] : null;

$query = "SELECT * FROM no_po WHERE id_no_po='".$id_no_po."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['level'])){?>

<?php if(isset($_SESSION['role_id'])){ ?>

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=no_po&file=nopo_data_view"> <i class="icon icon-arrow-left"></i> Back</a>
				<h3>Update No PO</h3>
				<form action="index.php?tab=datatabel&folder=no_po&file=nopo_act_update" method="post" id="form_update" name="form_update">
					<input type="hidden" name="id_no_po" value="<?php echo $id_no_po; ?>" />

					<div class="control-group">
						<label for="password">No. PO : </label>
						<div class="controls">
							<input value="<?php echo $data['no_po']; ?>" type="text"  name="no_po" placeholder="NO. PO"  required/>
						</div>
						
						<label for="password">Judul Kontrak : </label>
						<div class="controls">
							<input value="<?php echo $data['judul_kontrak']; ?>" type="text"  name="judul_kontrak" placeholder="Judul Kontrak"  required/>
						</div>
						
						
						<label>PERUSAHAAN</label>
						<div class="controls">
					<select name='id_perusahaan' onChange='javascript:dinamis(this)'>
									<?php 
										
										$id_perusahaan = $data['id_perusahaan'];
										
									if($id_perusahaan =='0' || $id_perusahaan ==''){
										echo "<option value='0' selected>-Perusahaan- </option>";
										$sql = mysql_query("SELECT * FROM perusahaan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_perusahaan]>$data2[nm_perusahaan]</option>";
										}
									}
									else {
										$sql = mysql_query("SELECT * FROM perusahaan WHERE id_perusahaan='$id_perusahaan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_perusahaan]>$data2[nm_perusahaan]</option>";
										}
									
										$sql = mysql_query("SELECT * FROM perusahaan  WHERE id_perusahaan != '$id_perusahaan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_perusahaan]>$data2[nm_perusahaan]</option>";
										}
									}
									?>
								</select>
							</div>
							
							<label>Pemegang Kontrak</label>
							<div class="controls">
							<select name='id_fpemegang_kontrak' onChange='javascript:dinamis(this)'>
									
									<?php 
										
										$id_fpemegang_kontrak = $data['id_fpemegang_kontrak'];
										
									if($id_fpemegang_kontrak =='0' || $id_fpemegang_kontrak ==''){
										echo "<option value='0' selected>- Pemegang Kontrak -</option>";
										$sql = mysql_query("SELECT * FROM fpemegang_kontrak");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id]>$data2[fungsi]</option>";
										}
									}
									else {
										$sql = mysql_query("SELECT * FROM fpemegang_kontrak WHERE id='$id_fpemegang_kontrak'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id]>$data2[fungsi]</option>";
										}
									
										$sql = mysql_query("SELECT * FROM fpemegang_kontrak  WHERE id != '$id_fpemegang_kontrak'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id]>$data2[fungsi]</option>";
										}
									}
									?>
								</select>
							</div>
							
						<div class="controls">
					
						
						<label> AWAL KONTRAK : </label>
						<div class="controls">
						<input type="text" name="awal_kontrak" id="tgl_mulai" value="<?php echo $data['awal_kontrak'];?>" />
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
								
									<label>BERAKHIR KONTRAK : </label>
                                <div class="controls">
								<input type="text" name="ahir_kontrak" id="tgl_selesai" value="<?php echo $data['ahir_kontrak'];?>"/>
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
					<div class="controls">
					<?
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>

					<div class="control-group">
						<button type="submit" value="update" class="btn btn-primary">
							<i class="icon icon-pencil"></i> Update
						</button>
					</div>
				</form>
			</div>
		</div>  
<?php } ?>
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>