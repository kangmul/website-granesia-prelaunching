<?php
	// koneksi database -------------------------------------------->
	include('db.php');
	
	if(isset($st)){
		include('config.php');
	}
	
	//<--------------------------------------------------------------
	empty( $f ) ? header('location:../../../index.php') :
	'' ;
	include "app/admin.php";
	
if($_SESSION['level']=='1'){?>

<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Gambar</label></h3>

				<?php

				if(isset($_SESSION['pesan'])){
					echo $_SESSION['pesan'];
					unset($_SESSION['pesan']);
				}

				?>
				<!-- END OF KONFIRMASI UPDATE DATA -->

				<a href="index.php?p=foto&f=foto_form_insert" class="btn-bg btn  btn-success pull-right">
					<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
				</br>
				</br>
				
				
					<script>
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
			<div class="panel panel-info">
		 <div class="panel-body">
				<table class="table table-condensed table-bordered" id="example">
					<thead>
					<tr class="success">
						<td>NO</td>
						<td>GAMBAR</td>
						<td>JUDUL</td>
						<td>KETERANGAN</td>
						
						<td>AKSI</td>
					</tr>
					</thead>
					<?php
							$batas=5;
							isset($_GET['halaman'])?$halaman=$_GET['halaman']:$halaman='';
							$posisi=null;

							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}

							
							$query="SELECT * FROM foto ";
							$query_page="SELECT * FROM foto ";
							
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<!--<td><?php  echo $rows['id']; ?></td>-->
						<td> <?php if(empty($rows['gambar'])){
											echo "Tidak Ada Gambar";
										}
										else{
											echo "<img src=app/foto/files/$rows[gambar] width=75 height=75 class=img-rounded>";
										}
										?></td>
						
						<td><?php  echo $rows['judul']; ?></td>
						<td><?php  echo $rows['keterangan']; ?></td>
						
						<td> <div class="btn-group">
							
							<a href="index.php?t=data&p=foto&f=foto_form_update&id=<?php  echo $rows['id']; ?>" class="btn-small btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i> Update</a>
							<a href="index.php?t=data&p=foto&f=foto_act_delete&id=<?php  echo $rows['id']; ?>"
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i> Delete</a>
							</div>
						</td>
					</tr>
								<?php
				 } ?>
					
				</table>
					
				</div>
				</div>
   
			</div>
		


  <?php }  
else {
		echo '<div class="alert alert-error"> Maaf Anda anda tidak punya akses </div>';
	}
?>