<?php 
// koneksi database -------------------------------------------->
//include('db.php');
//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>
	
	<script>
	$(document).ready(function() {
		$("#form_insert").validate({
			rules : {
				password : "required",
				nama : "required",
				passwordc : {
					equalTo : "#password"
				}
			}
		});
	}); 
</script>
<?php if($_SESSION['role_id']=='1'){ 
			include ('menuuser.php');
	
?>
	<h3>Input User</h3>
	<div class="row-fluid">
		<div class="span7">
		
								<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}

						?>
					<form action="index.php?tab=datausers&folder=users&file=user_act_insert" enctype="multipart/form-data" method="post" id="form_insert" name="form_insert">
						<div class="control-group well">
							
							<label for="username">Nama : </label>
							<div class="controls">
								<input type="text" name="nama" id="nama" placeholder="Nama Lengkap" required maxlength="100"/>
							</div>
							
							<label for="username">Username : </label>
							<div class="controls">
								<input type="text" value = "" name="username" id="username" placeholder="Username" required maxlength="100"/>
							</div>
							
							<label for="password">Password : </label>
							<div class="controls">
								<input type="password" name="password1" id="password" required maxlength="100"/>
							</div>
							
							<label for="password">Ketik Ulang Password : </label>
							<div class="controls">
								<input type="password" name="password2" id="password" required maxlength="100"/>
							</div>
							
							
							
							<label for="username">Otorisasi User: </label>
							<div class="controls">
								<select name="role_id" onChange='javascript:dinamis(this)' required> <option value=''>- otorisasi user -</option>
									<?php 
										
										$sql = mysql_query("SELECT * FROM roles");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id]>$data[role]</option>";
										}
									?>
								</select>
							</div>
							
							<label for="username">Jenis Kelamin : </label>
							
							<div class="controls">
								<select name ="jenis_kelamin"> <option value=>- Jenis Kelamin -</option>
									<option value="Laki - laki">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							
							<label for="username">Jabatan : </label>
							<div class="controls">
								<input type="text" name="jabatan" id="nama" placeholder="Jabatan User" required maxlength="100"/>
							</div>
							
							<label for="username">Email : </label>
							<div class="controls">
								<input type="text" name="email" id="nama" placeholder="Email" maxlength="100"/>
							</div>
							
							<label for="username">Alamat : </label>
							<div class="controls">
								<input type="text" name="alamat" id="nama" placeholder=""  maxlength="100"/>
							</div>

							<label for="username">No. Kontak </label>
							<div class="controls">
								<input type="text" name="no_kontak" id="nama" placeholder=""  maxlength="100"/>
							</div>
							
							<label for="username">Tanggal Lahir </label>
							<div class="controls">
								<input type="text" name="tgl_lahir" id="tgl_lahir" placeholder=""  maxlength="100"/>
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
							</div>
							

							<label for="username">Tempat Lahir </label>
							<div class="controls">
								<input type="text" name="tempat_lahir" id="nama" placeholder=""  maxlength="100"/>
							</div>


							
							<label for="username">foto : </label>
							<div class="controls">
								<input type="file" name="foto" id="foto" maxlength="300"/>
							</div>
						</div>
						
						<input type="hidden" name="status" value="aktif"/>
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
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>
