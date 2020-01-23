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
	if(isset($_SESSION['role_id'])){?>

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
 <?php if(isset($_SESSION['role_id'])){
			include ('menuuser.php');
	}
?>
		<div class="row-fluid">
			<div class="span9">
			<a class="btn btn-success" href="index.php?tab=datausers&folder=users&file=user_form_view"> <i class="icon icon-arrow-left"></i> Back</a>

				
					<form action="index.php?tab=datausers&folder=users&file=user_act_update_level" method="post" id="form_update" name="form_update">
						<input type="hidden" name="no" value="<?php echo $data['no']; ?>" />
						<div class="control-group">
							<label for="level"><b>Ganti Fungsi : </b></label>
								<div class="controls">
								
								<select name="role_id" onChange='javascript:dinamis(this)'>
                                <?php 
										$role_id = $data['role_id'];
									if($role_id =='0' || $role_id ==''){
										echo "<option value='0' selected>-Role ID- </option>";
										$sql = mysql_query("SELECT * FROM roles");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id]>$data2[role]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM roles where id='$role_id'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id]>$data2[role]</option>";
										}
										$sql = mysql_query("SELECT * FROM roles where id !='".$role_id."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id]>$data2[role]</option>";
										}
									}
									?>
                              </select>
							 
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
  
 <?}  
else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>

