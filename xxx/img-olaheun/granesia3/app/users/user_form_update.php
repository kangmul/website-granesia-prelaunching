<?php
include ('db.php');

// $username = $_GET['username'];

$id_fkerja = isset($_GET['id_fkerja']) ? $_GET['id_fkerja'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";

$query = "SELECT * FROM fungsi_kerja JOIN field on fungsi_kerja.id_field = field.id_field WHERE id_fkerja='$id_fkerja'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['level'])){?>

<?php if($_SESSION['level']=='superadmin'){ ?>

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


<html lang="en">
 <body>
 	<div class="container">
		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				<div class="container">
					<a class="btn btn-success" href="index.php?folder=fungsi_kerja&file=fkerja_form_view"> <i class="icon icon-arrow-left"></i> Back</a>
				<br />
				<br />

					<form action="index.php?folder=fungsi_kerja&file=fkerja_act_update" method="post" id="form_update" name="form_update">
						<input type="hidden" name="id_fkerja" value="<?php echo $data['id_fkerja']; ?>" />
						<div class="control-group">
							<label for="password">Fungsi Kerja : </label>
								<div class="controls">
									<input value="<?php echo $data['fkerja']; ?>" type="text" name="fkerja" placeholder="Fungsi Kerja"  class="required"/>
								</div>
								
							<label for="password">Field : </label>
								<div class="controls">
							<select name='id_field' onChange='javascript:dinamis(this)'>
								<?php 
										$id_field = $data['id_field'];
										$sql = mysql_query("SELECT * FROM field WHERE id_field = '$id_field'");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_field]>$data[nm_field]</option>";
										}
								?>
								<?php 
										$sql = mysql_query("SELECT * FROM field  WHERE id_field != '$id_field'");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_field]>$data[nm_field]</option>";
										}
								?>
								</select>
							</div>
						</div>
						<?
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
	</div>
  </body>
</html>
            
<?php } ?>
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>

