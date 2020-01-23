<?php
//include ('db.php');

$id_fkerja = isset($_GET['id_fkerja']) ? $_GET['id_fkerja'] : null;

$query = "SELECT * FROM fungsi_kerja WHERE id_fkerja='$id_fkerja'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>


<script>
	$(document).ready(function() {
		$("#form_update").validate({
			rules : {
				password : "required",
				passwordc : {
					equalTo : "#password"
				}
			}
		});
	}); 
</script>
		<?php if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='2')){?>
<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
					<a class="btn btn-success" href="index.php?tab=datatabel&folder=fungsi_kerja&file=fkerja_form_view"> <i class="icon icon-arrow-left"></i> Back</a>
				<h3>Update Fungsi Kerja</h3>

					<form action="index.php?tab=datatabel&folder=fungsi_kerja&file=fkerja_act_update" method="post" id="form_update" name="form_update">
						<input type="hidden" name="id_fkerja" value="<?php echo $data['id_fkerja']; ?>" />
						<div class="control-group">
							<label for="password">Fungsi Kerja : </label>
								<div class="controls">
									<input value="<?php echo $data['fkerja']; ?>" type="text" name="fkerja" placeholder="Fungsi Kerja"  required/>
								</div>
								
							</div>
						<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>

						<div class="control-group">
							<button type="submit" value="update" class="btn btn-primary">
								<i class="icon icon-pencil"></i> Update
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    <?php
	}  
else
{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>

<?php 
}
else
{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>

