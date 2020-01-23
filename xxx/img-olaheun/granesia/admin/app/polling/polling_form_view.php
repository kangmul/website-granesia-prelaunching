<?php
	include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	if(isset($st)){
		include('config.php');
	}
	
	//<--------------------------------------------------------------
	empty( $f ) ? header('location:../../index.php') :
	'' ;
	include "app/admin.php";

if((isset($_SESSION['level']))==1){ ?>



<div class="col-sm-10 main">


			<h3 ><label>Halaman Polling</label></h3>
			
						<?php

						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}

						?>
						
							
					
			
					<!-- TAMPILKAN DATA SUPERADMIN -->
			<div class="panel panel-info">
		 <div class="panel-body">
		 <h4>Pertanyaan Polling</h4>
		 </br>
				<table class="table table-condensed table-bordered" id="example">
					<thead>
					<tr class="success">
						<td>NO</td>
						
						<td>ID PERTANYAAN</td>
						<td>PERTANYAAN</td>
						<td>JAWABAN 1</td>
						<td>JAWABAN 2</td>
						<td>JAWABAN 3</td>
						<td>JAWABAN 4</td>
						
						
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

							
							$query="SELECT * FROM pertanyaan ";
							$query_page="SELECT * FROM pertanyaan ";
							
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<td><?php  echo $rows['id_tanya']; ?></td>
						
						<td><?php  echo $rows['pertanyaan']; ?></td>
						
						<td><?php  echo $rows['jawab_1']; ?></td>
						<td><?php  echo $rows['jawab_2']; ?></td>
						<td><?php  echo $rows['jawab_3']; ?></td>
						<td><?php  echo $rows['jawab_4']; ?></td>
						
						<td> <div class="btn-group">
							
							<a href="index.php?t=data&p=polling&f=polling_form_update&id_tanya=<?php  echo $rows['id_tanya']; ?>" class="btn-small btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i> Update</a>
							
							</div>
						</td>
					</tr>
								<?php
				 } ?>
					
				</table>
				</br>
				 <h4>Hasil Rekapitulasi Jawaban Polling</h4>
				 </br>
				<table class="table table-condensed table-bordered" id="example">
					<thead>
					<tr class="success">
						<td>NO</td>
						
						<td>ID PERTANYAAN</td>
						<td>JAWAB</td>
						<td>NILAI</td>
						
						
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

							
							$query="SELECT * FROM hasil ";
							$query_page="SELECT * FROM hasil ";
							
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<td><?php  echo $rows['id_tanya']; ?></td>
						
						<td><?php  echo $rows['jawab']; ?></td>
						
						<td><?php  echo $rows['nilai']; ?></td>
					
						
						<td> <div class="btn-group">
							
							<a href="index.php?t=data&p=polling&f=polling_hasil_act_delete&id_tanya=<?php  echo $rows['id_tanya']; ?>"
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i> Delete</a>
							
							</div>
						</td>
					</tr>
								<?php
				 } ?>
					
				</table>	
					</br>
					<?php echo "<p><a href=./app/polling/grafik.php>LIHAT GRAFIK HASIL POLLING</a>"; ?>
				</div>
				</div>
   			
	</div>
	
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>