<?php
	include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $f) ? header('location:../../index.php') :
	'' ;

	include "app/admin.php";
	//if(isset($_SESSION['role_id'])){
		

if($_SESSION['level']=='1'){?>

<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Pesan</label></h3>
				<!-- <legend>
					CRUD PHP & Bootstrap
				</legend> -->
				<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
				
				
				<!-- END OF FORM PENCARIAN -->
				<!-- MENAMBAHKAN KONFIRMASI JIKA UPDATE DATA BERHASIL -->
				<?php

				if(isset($_SESSION['pesan'])){
					echo $_SESSION['pesan'];
					unset($_SESSION['pesan']);
				}

				?>
				<!-- END OF KONFIRMASI UPDATE DATA -->

				<a href="index.php?t=data&p=slide_show&f=slideshow_form_insert" 
					class="btn  btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
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
						<td>Nama</td>
						<td>Website</td>
						<td>Isi Pesan</td>
						<td>Tanggal</td>
						<td>Pukul</td>
						<td>Aksi</td>
					</tr>
					</thead>
					<?php
							$batas=5;
							$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : null;
							$posisi=null;

							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}

							
							$query="SELECT * FROM shoutbox ";
							$query_page="SELECT * FROM shoutbox ";
							
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<!--<td><?php  echo $rows['id_shoutbox']; ?></td>-->
						<td><?php  echo $rows['nama']; ?></td>
						<td><?php  echo $rows['website']; ?></td>
						<td><?php  echo $rows['pesan']; ?></td>
						<td><?php  echo $rows['tanggal']; ?></td>
						<td><?php  echo $rows['jam']; ?></td>
						<td>
							<div class="btn-group">
							
							<!--<a href="index.php?t=data&p=slide_show&f=slideshow_form_update&id=<?php  echo $rows['id_shoutbox']; ?>" class="btn-sm btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i> Update</a>-->
							<a href="index.php?p=pesan&f=pesan_act_delete&id_shoutbox=<?php  echo $rows['id_shoutbox']; ?>"
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-sm btn btn-danger">
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