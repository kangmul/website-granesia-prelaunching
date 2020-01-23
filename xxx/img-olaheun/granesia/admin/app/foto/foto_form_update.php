<?php
include ('db.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

$query = "SELECT * FROM foto WHERE id='".$id."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $f ) ? header('location:../../index.php') : '' ;
	include "app/admin.php";
	
if($_SESSION['level']=='1'){?>

<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Gambar Update</label></h3>

				<a class="btn btn-success" href="index.php?t=data&p=foto&f=foto_data_view"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>

				<h3>Update Gambar</h3>

				<div class="panel panel-info">
		 <div class="panel-body">
				<form action="index.php?t=data&p=foto&f=foto_act_update" method="post" id="form_update" name="form_update" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
					<input type="hidden" name="gambar" value="<?php echo $data['gambar']; ?>" />
					

					<div class="control-group">
						
						
						                           <tr>
                            <td><label>Gambar : </label></td>
							</br>
                            <td>
							<?php
									if(empty($data['gambar'])){
											echo "<img src=app/foto/files/noimage.jpg width=55 height=55 class=img-rounded>";
										}
										else{
											echo "<img src=app/foto/files/$data[gambar] width=150 height=150 class=img-rounded>";
										}
								?> 
								<input  type="file" name="gambar" id="gambar"  value="<?php echo $data['gambar'];?>"  />
								</td>
								</br>
                          </tr>

						  
						  
						 </br>
						  <tr></br>
                            <td><label>Judul Foto : </label></td></br>
                            <td>
								<input type="text" name="judul"  class="form-control" style=" width:400px;" 
								id="judul" value="<?php echo $data['judul'];?>" required/>							</td>
                          </tr>
							
						<tr></br>
                            <td><label>Keterangan : </label></td></br>
                            <td>
								<input type="text" name="keterangan"  class="form-control" style=" width:400px;" 
								id="keterangan" value="<?php echo $data['keterangan'];?>" required/>							</td>
                          </tr>
						  
					</div>

					<?
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>
</br>
					<div class="control-group">
						<button type="submit" value="update" class="btn btn-primary">
							<i class="glyphicon glyphicon-saved"></i> Update
						</button>
					
					</div>
						</br>
				</form>
			</div>
			</div>
			</div>
		</div>
 

  <?php }  
else {
		echo '<div class="alert alert-error"> Maaf Anda anda tidak punya akses </div>';
	}
?>