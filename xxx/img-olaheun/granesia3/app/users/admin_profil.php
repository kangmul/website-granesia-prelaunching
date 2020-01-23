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
		?>
	
						<?php

						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}

						?>
						<!-- END OF KONFIRMASI UPDATE DATA -->
						
						<?php
							$index = $_SESSION['index'];				
							$query="SELECT * FROM user where no ='".$index."'";
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
					<div class="span6">
					  <!--Body content-->

					  
					<table class="table well">
						  <tr class="info">
						    <td><strong>Username</strong></td>
						    <td><?php echo $rows['username']; ?></td>
					      </tr>
						 
						  <tr class="success">
						    <td><strong>Jenis Kelamin</strong></td>
							<td><?php echo $rows['jenis_kelamin']; ?></td>
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
					
					<div class="span2">
				
					  <!--Sidebar content-->
					</div>
				  </div>
				</div>

						


<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



