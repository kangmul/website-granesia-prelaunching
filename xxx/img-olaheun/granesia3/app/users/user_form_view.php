<?php
	// koneksi database -------------------------------------------->
	//include('db.php');
	if(isset($st)){
		include('config.php');
	}
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
			include ('menuuser.php');
?>
		<div class="row-fluid">
			<div class="span9">
					<h3> Administrator </h3>
						<?php

						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}

						?>
			
					<!-- TAMPILKAN DATA SUPERADMIN -->
						
					<table class="table table-condensed table-striped well">
						<tr>
							<th><center>No</center></th>
							<th><center>Username</center></th>
							<th><center>Fungsi</center></th>					
							<th><center>Status</center></th>
							<th><center>Action</center></th>
						</tr>
						<?php
							$query="SELECT * FROM user LEFT JOIN roles ON user.role_id = roles.id where role_id = '1' AND no != '1'";
							$result=mysql_query($query) or die(mysql_error());
							$no=1;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>

						<tr>
							<td><center><?php echo $no; ?></center></td>
							<td><center><?php echo $rows['username']; ?></center></td>
							<td><center><?php echo $rows['role']; ?></center></td>
							<td><center><?php echo $rows['status']; ?></center></td>
							<td><center>
							<div class="btn-group">
								<a href="index.php?tab=datausers&folder=users&file=user_form_detail_view&no=<?php echo $rows['no']; ?>" 
									class="btn-small btn btn-info"><i class="icon icon-search"></i> Detail</a>
								<a href="index.php?tab=datausers&folder=users&file=user_act_delete_hapus&no=<?php echo $rows['no']; ?>" 
									onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
									<i class="icon icon-trash"></i> Delete</a>
								</div>					
							</center></td>
						</tr>
						<?php
							$no++; 
							}
						?>
					</table>
					
					</br>
					</br>
					</br>
					<h3> Pengguna </h3>
						<?php

						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}

						?>
						
						
						<!-- TAMPILKAN DATA PENGGUNA -->
						
					<table class="table table-condensed table-striped well">
						<tr>
							<th><center>No</center></th>
							<th><center>Username</center></th>
							<th><center>Fungsi</center></th>					
							<th><center>Status</center></th>
							<th><center>Action</center></th>
						</tr>
						<?php
							$query="SELECT * FROM user LEFT JOIN roles ON user.role_id = roles.id where role_id != '1'";
							$result=mysql_query($query) or die(mysql_error());
							$no=1;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>

						<tr>
							<td><center><?php echo $no; ?></center></td>
							<td><center><?php echo $rows['username']; ?></center></td>
							<td><center><?php echo $rows['role']; ?></center></td>
							<td><center><?php echo $rows['status']; ?></center></td>
							<td><center>
								<div class="btn-group">
								<a href="index.php?tab=datausers&folder=users&file=user_form_detail_view&no=<?php echo $rows['no']; ?>" 
									class="btn-small btn btn-info"><i class="icon icon-search"></i> Detail</a>
								<a href="index.php?tab=datausers&folder=users&file=user_form_update_level&no=<?php echo $rows['no']; ?>" 
									class="btn-small btn btn-warning"><i class="icon icon-pencil"></i> Edit Fungsi</a>
								<a href="index.php?tab=datausers&folder=users&file=user_form_update_password&no=<?php echo $rows['no']; ?>" 
									class="btn-small btn btn-warning"><i class="icon icon-pencil"></i> Edit Password</a>
										
										<?php if($rows['status'] == 'nonaktif'){?>
											<a href="index.php?tab=datausers&folder=users&file=user_act_update_stat&no=<?php echo $rows['no']; ?>&stat=<?php echo $rows['status']; ?>" class="btn-small btn btn-danger">
											<i class="icon icon-ok"></i> Aktifkan</a>
										<?php }else if($rows['status'] == 'aktif'){?>
											<a href="index.php?tab=datausers&folder=users&file=user_act_update_stat&no=<?php echo $rows['no']; ?>&stat=<?php echo $rows['status']; ?>" class="btn-small btn btn-danger">
											<i class="icon icon-trash"></i> Nonaktifkan</a>
										<?php }?>
										
										
								<a href="index.php?tab=datausers&folder=users&file=user_act_delete_hapus&no=<?php echo $rows['no']; ?>" 
									onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
									<i class="icon icon-trash"></i> Delete</a>
								</div>	
								</center>
							</td>
						</tr>
						
						<?php
							$no++;
							}
						?>
					</table>
		</div>
	</div>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



