<?php 
// koneksi database -------------------------------------------->
include('../../db.php');
//<--------------------------------------------------------------

empty( $f ) ? header('location:../../index.php') : '' ;
	include "app/admin.php";
	//if(isset($_SESSION['role_id'])){
		

if($_SESSION['level']=='1'){?>
<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Link Pilihan Tambah</label></h3>
			
				<a class="btn btn-success" href="index.php?t=data&p=link_terkait&f=linkterkait_data_view"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>

					<h3>Input Link Pilihan</h3>
				<div class="panel panel-info">
		 <div class="panel-body">
				<form action="index.php?t=data&p=link_terkait&f=linkterkait_act_insert" method="post" id="form_insert" name="form_insert" enctype="multipart/form-data">
					
					
						<label> Tag URL : </label>
						<div class="controls">
							<input type="text" class="form-control" style=" width:400px;" 
								name="tag_link" id="tag_link" placeholder="URL" class="required" maxlength="200"/>
						</div>
						</br>
						<label> Nama Link : </label>
						<div class="controls">
							<input type="text" class="form-control" style=" width:400px;" 
								name="nama_link" id="nama_link" placeholder="Nama Link" class="required" maxlength="200"/>
						</div>
						</br>
						<tr>
                            <td><label>Gambar : </label></td>
							</br>
							<p>(Ukuran weight:960px Height:360px)</p>
							
                            <td>
								<input type="file" name="gambar" id="gambar" maxlength="100" "required" />							</td>
                          </tr>
						  </br>

						
					
					<?php
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>

					<div class="control-group">
						<button type="submit" class="btn btn-primary">
							<i class="glyphicon glyphicon-saved"></i> Simpan
						</button>
						<button type="reset" class="btn btn-warning">
							<i class="glyphicon glyphicon-refresh"></i> Batal
						</button>
					</div>
				</br>
				</form>
			</div>
			</div>
			</div>
		
 
 
  <?php }  
else {
		echo '<div class="alert alert-error"> Maaf Anda anda tidak punya akses </div>';
	}
?>

