<?php
//include ('db.php');
// $username = $_GET['username'];

$no = isset($_GET['no']) ? $_GET['no'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";

$query = "SELECT * FROM user  WHERE no='$no'";

$result = mysql_query($query);
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['level'])){?>

<?php if($_SESSION['role_id']=='1'){ ?>

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
 <?php if($_SESSION['role_id']){ 
			include ('menuuser.php');
	}
?>
		<div class="row-fluid">
			<div class="span9">
				<div class="container">

					<form action="index.php?tab=datausers&folder=users&file=user_act_update_password" method="post" id="form_update" name="form_update">
						<input type="hidden" name="no" value="<?php echo $data['no']; ?>" />
						<input type="hidden" name="password_lama" value="<?php echo $data['password']; ?>" />
						
						<div class="control-group">
							<label for="level"><b>Ganti PASSWORD : </b></label>
								<div class="controls">
									<input type="password" name="password_baru" value=""/>
								</div>
						</div>
						<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>
						</br>
						<div class="control-group">
							<button type="submit" value="update" class="btn btn-primary">
								<i class="icon icon-pencil"></i> Update
							</button>
						</div>
					</form>
				</div>
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
