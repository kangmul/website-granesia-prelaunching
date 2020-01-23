<?php
//include ('db.php');
// $username = $_GET['username'];

$index = $_SESSION['index'];

$query = "SELECT * FROM user  WHERE no='$index'";

$result = mysql_query($query);
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
			<div class="span9 well">

					<form action="index.php?tab=datausers&folder=users&file=admin_act_update" method="post" id="form_update" enctype="multipart/form-data" name="form_update">
						<input type="hidden" name="no" value="<?php echo $data['no']; ?>" />
						<input type="hidden" name="password_lama" value="<?php echo $data['password']; ?>" />
						<input type="hidden" name="foto_lama" value="<?php echo $data['foto']; ?>" />
						<div class="control-group">
								<div class="controls">
									<label for="level"><b> Username : </b></label>
									<input type="text" name="username" value="<?php echo $data['username']; ?>" required/>
								</div>
								<div class="controls">
									<label for="level"><b> Password Baru: </b></label>
									<input type="password" name="password_baru" value=""/>
								</div>
								<div class="controls">
									<label for="level"><b> Nama Lengkap : </b></label>
									<input type="text" name="nama" value="<?php echo $data['nama']; ?>" />
								</div>
								<div class="controls">
									<label for="level"><b> Jenis Kelamin : </b></label>
									<input type="radio" name="jenis_kelamin" value="Laki - Laki" <?php if($data['jenis_kelamin']=='laki - laki') echo "checked"; ?>> Laki - Laki </br>
									<input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($data['jenis_kelamin']=='perempuan') echo "checked"; ?>> Perempuan
								</div>
								</br>
								<div class="controls">
									<label for="level"><b> Email : </b></label>
									<input type="text" name="email" value="<?php echo $data['email']; ?>" />
								</div>
								<div class="controls">
									<label for="level"><b> Alamat : </b></label>
									<input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" />
								</div>
								<div class="controls">
									<label for="level"><b> No Kontak : </b></label>
									<input type="text" name="no_kontak" value="<?php echo $data['no_kontak']; ?>" />
								</div>
								<div class="controls">
									<label for="level"><b> Tanggal Lahir : </b></label>
									<input type="text" name="tgl_lahir" id="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" />
								</div>
								<script src="asset/js/jquery.min.js"></script>
									<script src="asset/js/bootstrap-datepicker.js"></script>
									<script type="text/javascript">
										// When the document is ready
										$(document).ready(function () {
									
											$('#tgl_lahir').datepicker({
												format: "yyyy-mm-dd"
											});  
								
										});
									</script>
								<div class="controls">
									<label for="level"><b> Tempat Lahir : </b></label>
									<input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"/>
								</div>
								<div class="controls">
									<label for="level"><b> Foto : </b></label>
									<?php
										if(empty($data['foto'])){
												echo "<img src=app/users/user_foto/noimage.jpg width=55 height=55 class=img-rounded>";
											}
											else{
												echo "<img src=app/users/user_foto/$data[foto] width=150 height=150 class=img-rounded>";
											}
									?> 
									<input type="file" name="foto"/>
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
  
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>

