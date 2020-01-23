<?php
	// koneksi database -------------------------------------------->
	include('db.php');
	//if(isset($st)){
		//include ('config.php');
	//}
	//<--------------------------------------------------------------
	empty( $f ) ? header('location:../../index.php') :
	'' ;

	include "app/admin.php";
	//if(isset($_SESSION['role_id'])){
		

if($_SESSION['level']=='1'){?>
<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Link Pilihan</label></h3>

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
					
					<a href="index.php?t=data&p=link_terkait&f=linkterkait_form_insert" class="btn  btn-success pull-right">
					<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
					</br>
					</br>
				<!-- END OF KONFIRMASI UPDATE DATA -->
				
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
							<td>URL</td>
						<td>NAMA LINK</td>
						<td>GAMBAR</td>
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

							$query="SELECT * FROM link_terkait ";
							$query_page="SELECT id_link FROM link_terkait";


							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<!--<td><?php  echo $rows['id_link']; ?></td>-->
						
						<td><?php  echo $rows['tag_link']; ?></td>
						<td><?php  echo $rows['nama_link']; ?></td>
						<td><?php
						if(empty($rows['gambar'])){
											echo "Tidak Ada Gambar";
										}
										else{
											echo "<img src=app/link_terkait/files/$rows[gambar] width=100 height=100 class=img-rounded>";
										}
						?>
						</td>
						<td>
							<div class="btn-group">
							
							<a href="index.php?t=data&p=link_terkait&f=linkterkait_form_update&id_link=<?php  echo $rows['id_link']; ?>" class="btn-sm btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i> Update</a>
							<a href="index.php?t=data&p=link_terkait&f=linkterkait_act_delete&id_link=<?php  echo $rows['id_link']; ?>"
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