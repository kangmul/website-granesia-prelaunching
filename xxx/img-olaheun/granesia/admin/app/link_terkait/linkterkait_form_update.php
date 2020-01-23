<?php
include ('db.php');

$id_link = isset($_GET['id_link']) ? $_GET['id_link'] : null;

$query = "SELECT * FROM link_terkait WHERE id_link  ='".$id_link."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $f ) ? header('location:../../index.php') : '' ;
	include "app/admin.php";
	//if(isset($_SESSION['role_id'])){
		

if($_SESSION['level']=='1'){?>
<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Link Pilihan Update</label></h3>
			
				<a class="btn btn-success" href="index.php?t=data&p=link_terkait&f=linkterkait_data_view"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>

				<h3>Update Link Terkait</h3>
				<div class="panel panel-info">
		 <div class="panel-body">
				<form action="index.php?p=link_terkait&f=linkterkait_act_update" method="post" id="form_update" name="form_update" enctype="multipart/form-data">
					<input type="hidden" name="id_link" value="<?php echo $id_link; ?>" />
					<input type="hidden" name="gambar" value="<?php echo $data['gambar']; ?>" />

					<div class="control-group">
						
						<label> Tag Link : </label>
						<div class="controls">
							<input value="<?php echo $data['tag_link']; ?>" type="text" class="form-control" style=" width:400px;" 
								name="tag_link" placeholder="URL" class="required" maxlength="300"/>
						</div></br>
						<label> Nama Link : </label>
						<div class="controls">
							<input value="<?php echo $data['nama_link']; ?>" type="text" class="form-control" style=" width:400px;" 
								name="nama_link" id="nama_link" placeholder="Nama Link" class="required" maxlength="300"/>
						</div></br>
						
						<tr>
                            <td><label>Gambar : </label></td>
							</br>
                            <td>
							<?php
									if(empty($data['gambar'])){
											echo "<img src=app/link_terkait/files/noimage.jpg width=55 height=55 class=img-rounded>";
										}
										else{
											echo "<img src=app/link_terkait/files/$data[gambar] width=150 height=150 class=img-rounded>";
										}
								?> 
								</br>
								<input  type="file" name="gambar" id="gambar"  value="<?php echo $data['gambar'];?>"  />
								</td>
								</br>
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
				</form>
		
	</div>
	</div>
	</div>
	
	
  
 <?php }  
else {
		echo '<div class="alert alert-error"> Maaf Anda anda tidak punya akses </div>';
	}
?>