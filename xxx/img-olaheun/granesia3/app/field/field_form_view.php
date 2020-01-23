<?php 
// koneksi database -------------------------------------------->
	//include('db.php');
	if(isset($st)){
		include('config.php');
	}
//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>



		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				<h3>Field</h3>
					
					<?
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>
					<!-- END OF KONFIRMASI UPDATE DATA -->
 
					<table class="table table-condensed table-bordered">
					<tr class="success">
							<td>No</td>
							<td>Nama</td>
							<td>Aksi</td>
						</tr>
	
						<?php
							$batas=5;
							isset($_GET['halaman'])?$halaman=$_GET['halaman'] : $halaman='';
							$posisi=null;
							if(empty($halaman)){
							$posisi=0;
							$halaman=1;
							}else{
							$posisi=($halaman-1)* $batas;
							}
							$query="SELECT * FROM field ORDER BY id_field LIMIT $posisi,$batas";
								$query_page="SELECT nm_field FROM field";
							if(isset($_POST['nm_field'])){
							$nm_field=$_POST['nm_field'];
							$query="SELECT * FROM field WHERE nm_field LIKE '%$nm_field%'";
								$query_page="SELECT nm_field FROM field WHERE nm_field LIKE '%$nm_field%'";
							}
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>

						<tr class="info">
							<!-- <td><?php echo $no++; ?></td> -->
							<td><?php echo $no+$posisi; ?></td>
							<td><?php echo $rows['nm_field']; ?></td>
							<td align="center">
								<div class="btn-group">
							
								<a href="index.php?tab=datatabel&folder=field&file=field_form_update&nm_field=<?php echo $rows['nm_field']; ?>" class="btn-small btn btn-warning">
									<i class="icon icon-pencil"></i> Update</a>
								<a href="index.php?tab=datatabel&folder=field&file=field_act_delete&nm_field=<?php echo $rows['nm_field']; ?>" 
									onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
									<i class="icon icon-trash"></i> Delete</a>
								</div>
							</td>
						</tr>
					
						<?php
						}
						?>
						<tr class="info">
							<td></td>
							<td></td>
						<td colspan="3"><a href="index.php?tab=datatabel&folder=field&file=field_form_insert" class="btn  btn-success"><i class="icon icon-plus"></i> Add</a></td>
						</tr>
					</table>
						<?php
						$result_page = mysql_query($query_page);
						$jmldata = mysql_num_rows($result_page);
						$jmlhalaman = ceil($jmldata / $batas);
						 
						echo 
						"<div class='pagination'><ul>"; 
							for($i=1;$i<=$jmlhalaman;$i++) 
								echo "<li> <a href=$_SERVER[PHP_SELF]?tab=datatabel&folder=$folder&file=$file&halaman=$i>$i</a></li>"; 
							?>
						</ul>
						</div>

					<!-- MENAMPILKAN JUMLAH DATA -->
				<div class="well">
					<?php
					echo "Jumlah Data : $jmldata";	
					?>
				</div>
					<!-- END OF MENAMPILKAN JUMLAH DATA -->
			</div>
		</div> 

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>