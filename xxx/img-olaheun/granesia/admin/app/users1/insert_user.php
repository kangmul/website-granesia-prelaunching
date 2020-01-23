<?php empty( $f ) ? header('location:../index.php') : '' ;

// koneksi database -------------------------------------------->
include('db.php');
//<--------------------------------------------------------------


if(isset($_SESSION['gid'])){?>
<?php 
	//role_id diambil dari database -> 1=superadmin, 2 = adm_jtb
	if(isset($_SESSION['gid'])=='1'){ ?>

			<?php include "app/admin.php";?>
<div class="col-sm-10">
			<?php include "app/users/menuuser.php";?>
			
			<h3 class="page-header"><label>Tambah User</label></h3>	
					
					
					
					
								<?
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}

						?>
			
		<div class="panel panel-info">
			 <div class="panel-body">
					<form action="index.php?t=menuuser&p=users&f=user_act_insert" enctype="multipart/form-data" method="post" id="form_insert" name="form_insert">
							<label for="nopek">Nopek : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="text" class="form-control" pattern="d\*" name="country" id="country" placeholder="Nopek" required maxlength="100"/>
								</div>
							</div>
							<label for="first_name">First Name : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required maxlength="100"/>
								</div>
							</div>
							
							<label for="last_name">Last Name : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required maxlength="100"/>
								</div>
							</div>
							
							<label for="email">Username : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="text" class="form-control" value = "" name="email" id="email" placeholder="Username" required maxlength="100"/>
								</div>
							</div>
							
							<label for="password">Password : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="password" class="form-control" name="password1" id="password" required maxlength="100"/>
								</div>
							</div>
							
							<label for="password">Ketik Ulang Password : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="password" class="form-control" name="password2" id="password" required maxlength="100"/>
								</div>
							</div>
							
							
							<label for="username">Otorisasi User: </label>
							<div class="row">
								<div class="col-xs-4">
									<select name="gid" class="form-control" onChange='javascript:dinamis(this)' required> <option value=''>- User Group -</option>
									<?php 
										
										$sql = mysql_query("SELECT * FROM user_group");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[gid]>$data[group_name]</option>";
										}
									?>
									</select>
								</div>
							</div>
							
							<label for="nopek">Super User : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="text" class="form-control" name="su" id="su" placeholder="Input number 1 for admin & 0 for operator" required maxlength="100"/>
								</div>
							</div>

						</br>
						</br>
						<input type="hidden" name="status" value="Y"/>
						<div class="control-group">
							<button type="submit" class="btn btn-primary">
								<i class="glyphicon glyphicon-saved"></i> Simpan
							</button>
							<button type="reset" class="btn btn-warning">
								<i class="glyphicon glyphicon-refresh"></i> Batal
							</button>
						</div>
						</br>
						</br>
					
					</form>
			<?php
	}?>
	</div>
	</div>
	</div>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>