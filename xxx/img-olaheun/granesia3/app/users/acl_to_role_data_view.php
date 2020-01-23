<?php
	include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;
$id = isset($_GET['id']) ? $_GET['id'] : null;
	if(isset($_SESSION['level'])){
		?>
		
</script>
<?php if(isset($_SESSION['role_id'])){
include ('menuuser.php');
?>

		<div class="row-fluid">
				<h3>Otorisasi Pengguna</h3>
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
				<?php
				$result = mysql_query("SELECT * FROM roles WHERE id = '$id'") or die(mysql_error);
				while($row = mysql_fetch_array($result)){
				echo "<b>Fungsi : ".$row['role']."</b>";
				}
				
				?>
				<table class="table table-condensed table-striped">
					<tr>
						<th>NO</th>
						<th>Otorisasi</th>
						
					</tr>
					<?php
							$batas=5;
							$halaman=$_GET['halaman'];
							$posisi=null;

							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}
									
									//where roles.id = $id
									
							$query="SELECT * FROM acl_to_roles LEFT JOIN acl ON acl_to_roles.acl_id = acl.id 
										JOIN roles ON acl_to_roles.role_id = roles.id where roles.id = $id
										ORDER BY acl_to_roles.id ";
							
							
							/*
							$query="SELECT * FROM acl ORDER BY id ";
							$query_page="SELECT * FROM acl";
							*/
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr>
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<td><?php  echo $rows['deskripsi']; ?></td>
						<?php /*
						<td><input type="checkbox" name="checkbox" value="<?php echo ($rows['role_id'] == $id)?>" <?php echo ($rows['role_id'] == $id) ? 'checked="checked"' : ''; ?>/>	
								
						</td>
						*/?>
					</tr>
								<?php } ?>
								<?/*
					<tr>
						<td></td>
						<td></td>
						<td colspan="4"><a href="index.php?tab=datatabel&folder=no_po&file=nopo_form_insert" class="btn  btn-success"><i class="icon icon-plus"></i> Add</a></td>
					</tr>
					*/ ?>
				</table>
				</div>
	
<?php  } ?>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>