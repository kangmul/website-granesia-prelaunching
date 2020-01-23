<?php
	// koneksi database -------------------------------------------->
	include('db.php');
	
	if(isset($st)){
		include('config.php');
	}
	
	//<--------------------------------------------------------------
	empty( $f ) ? header('location:../../index.php') :
	'' ;
	include "app/admin.php";
	
if($_SESSION['level']=='1'){?>

<div class="col-sm-10 main">
			
					
				<h1>Upload Data</h1>
								  </br>
								  </br>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					
					<?php
					if(isset($_SESSION['pesan'])){
		echo $_SESSION['pesan'];
		unset($_SESSION['pesan']);
	}	?>
	
					<a class="btn btn-success" href="index.php?t=data&p=upload&f=upload_data_view"> <i class="icon icon-arrow-left"></i> Kembali</a>
					</br></br>
					
			<div class="panel panel-info">
		 <div class="panel-body">
						<form action="index.php?t=data&p=upload&f=upload_act_insert" method="post" id="form_insert" name="form_insert" enctype="multipart/form-data">
						
						</br>
						<tr>
						<label>UPLOAD</label>
							<input type="file" name="nama_file" placeholder="masukan kategori">
					  </tr>
					  </br>
					 
					  <div class="form-group">
						<label>KETERANGAN</label>
							<input type="text" style="width:400px;" class="form-control" name="keterangan" placeholder="masukan judul upload">
					  </div>
					</br>
						<div class="control-group">
							<input type="submit" class="btn btn-primary" value="Lanjut">
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