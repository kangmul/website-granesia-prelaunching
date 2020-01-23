<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
	include ('menuuser.php');
		?>

				<h3> Detail User </h3>
				</br>
					
						<?php

						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}

						?>
						<!-- END OF KONFIRMASI UPDATE DATA -->
						
						<?php
							$no = isset($_GET['no']) ? $_GET['no'] : null;
							
							$query="SELECT * FROM user where no ='$no'";
							$result=mysql_query($query) or die(mysql_error());
	
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>
<div class="container-fluid">
				  <div class="row-fluid">
				 
					<div class="span2">
					
					<?php
									if(empty($rows['foto'])){
											echo "<img src=app/users/user_foto/noimage.jpg width=200 height=300 class=img-rounded>";
										}
										else{
											echo "<img src=app/users/user_foto/$rows[foto] width=200 height=300 class=img-rounded>";
										}
								?>
								
								<h3><?php echo $rows['nama']; ?></h3>
					  <!--Sidebar content-->
					</div>
					<div class="span10">
					  <!--Body content-->

					  
					<table class="table well">
						  <tr class="info">
						    <td><strong>Username</strong></td>
						    <td><?php echo $rows['username']; ?></td>
					      </tr>
						  <tr>
						    <td><strong>Jabatan</strong></td>
							<td><?php echo $rows['jabatan']; ?></td>
						  </tr>
						 
						  <tr>
						    <td><strong>Email</strong></td>
							<td><?php echo $rows['email']; ?></td>
						  </tr>
						  <tr  class="warning">
						    <td><strong>Alamat</strong></td>
							<td><?php echo $rows['alamat']; ?></td>
						  </tr>
						  <tr>
						    <td><strong>Tempat Lahir</strong></td>
							<td><?php echo $rows['tempat_lahir']; ?></td>
						  </tr>
						  <tr class="info">
						    <td><strong>No Kontak</strong></td>
							<td><?php echo $rows['no_kontak']; ?></td>
						  </tr>
						  <tr>
						    <td><strong>Status</strong></td>
							<td><?php echo $rows['status']; ?></td>
						  </tr>
						</table>
						<?php
							}
						?>
					</div>
				</div>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



