	<?php 
	
	include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $f ) ? header('location:../../index.php') :
	'' ;
	
	include "app/menudata.php";
	
if($_SESSION['level']=='1'){?>
	
	
	<div class="col-sm-10 main">
			<h3 class="page-header"><label>Data Berkas Upload</label></h3>
			
				
				<?php

				if(isset($_SESSION['pesan'])){
					echo $_SESSION['pesan'];
					unset($_SESSION['pesan']);
				}

				?>
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
						<td>nm_upload</td>
						<td>keterangan</td>
						<td>Tanggal Upload</td>
						<td>Pengawas Upload</td>
					</tr>
					</thead>
					<?php
							$posisi=null;
							
							$query="SELECT nm_upload,ket,tanggal,oleh,count(nm_upload) as jumlah, nama 
									FROM upload_berkas 
									Left Join user on user.id = upload_berkas.oleh 
									GROUP BY nm_upload ";
							
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<td><?php  
								if(empty(file_exists('app/monitor/upload/'.$rows['nm_upload']))){
								echo "File Kosong";
								}
								else {
								
								echo '<a href="app/monitor/upload/'.$rows['nm_upload'].'" target=_blank"><i class="icon icon-plus"></i>'.$rows['nm_upload'].'</a>';
								}	
									echo " "."<span class=badge pull-right>".$rows['jumlah']."</span>"; ?></td>
						<td><?php  echo $rows['ket']; ?></td>
						<td><?php  echo date('d-m-Y', strtotime($rows['tanggal'])); ?></td>
						<td><?php  echo $rows['nama']; ?></td>
						
					</tr>
								<?php
				 } ?>
				</table>
					
			</div>
			</div>
		</div>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda anda tidak punya akses </div>';
	}
?>