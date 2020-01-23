<?php 
// koneksi database -------------------------------------------->
//include('db.php');
//<--------------------------------------------------------------

empty( $f ) ? header('location:../../index.php') : '' ;
	include "app/admin.php";
	
if($_SESSION['level']=='1'){?>

<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Tambah Foto</label></h3>


		
				<a class="btn btn-success" href="index.php?p=foto&f=foto_data_view"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>

				
				<h3>Input Gambar</h3>
					<div class="panel panel-info">
		 <div class="panel-body">
				<form action="index.php?t=data&p=foto&f=foto_act_insert" method="post" id="form_insert" name="form_insert" enctype="multipart/form-data" >
					
					<div class="control-group">
					
						 <tr>
                            <td><label>Gambar : </label></td>
							</br>
                            <td>
								<input type="file" name="gambar" id="gambar" maxlength="100" required /></td>
                          </tr>
						  
						  <tr>
						  </br>
                            <td><label>Judul : </label></td>
							</br>
                            <td>
								<input type="text" name="judul" class="form-control" style=" width:400px;" 
								id="judul" placeholder="Judul" maxlength="100" required/>							
							</td>
                          </tr>
						 
						  <tr>
						  </br>
                            <td><label>Keterangan : </label></td>
							</br>
                            <td>
								<input type="text" name="keterangan" class="form-control" style=" width:400px;" 
								id="keterangan" placeholder="Keterangan" maxlength="100" required/>							
							</td>
                          </tr>
						 
						  
						  
					</div>
</br>
					<div class="control-group">
						<button type="submit" class="btn btn-primary">
							<i class="glyphicon glyphicon-saved"></i> Simpan
						</button>
						<button type="reset" class="btn btn-warning">
							<i class="glyphicon glyphicon-refresh"></i> Batal
						</button>
					</div>
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