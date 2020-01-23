<?php
//include ('db.php');
$nm_field = isset($_GET['nm_field']) ? $_GET['nm_field'] : null;

$query = "SELECT * FROM field WHERE nm_field='$nm_field'";
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
	

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				
					<a class="btn btn-success" href="index.php?tab=datatabel&folder=field&file=field_form_view"> <i class="icon icon-arrow-left"></i> Back</a>
					<h3>Update Field</h3>
					<form action="index.php?tab=datatabel&folder=field&file=field_act_update" method="post" id="form_update" name="form_update">
						<input type="hidden" name="id_field" value="<?php echo $data['id_field']; ?>" />
						<div class="control-group">
							<label for="password">Field : </label>
							<div class="controls">
								<input value="<?php echo $data['nm_field']; ?>" type="text" name="nm_field" placeholder="Nama Field"  required/>
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
            

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>

