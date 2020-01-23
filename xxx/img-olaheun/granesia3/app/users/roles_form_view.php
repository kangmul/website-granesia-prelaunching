<?php 
//include('db.php');
// koneksi database -------------------------------------------->

//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;?>

<?php if(isset($_SESSION['role_id'])){ 
include ('menuuser.php');
?>



		<div class="row-fluid">
			<div class="span9">
				<h3>Manajemen Fungsi</h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
					<!-- <form name="user_form_search" action="" method="post" class="form-search"> -->
					<!--	<input type="text" name="username" placeholder="Masukkan Username"/> -->
					<!--	<a href='user_form_view.php' class="btn btn-primary" ><i class='icon-list'></i>All</a> -->
					<!-- </form> -->
					<!-- END OF FORM PENCARIAN -->
					
					<!-- MENAMBAHKAN KONFIRMASI JIKA UPDATE DATA BERHASIL -->
					<?php
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>
					<!-- END OF KONFIRMASI UPDATE DATA -->
 
					<table class="table table-condensed table-striped well">
						<tr>
							
							<th>Id</th>
							<th>Fungsi</th>
							<th>Aksi</th>
						</tr>
	
						<?php
							$query="SELECT * FROM roles ORDER BY id ASC";
								$query_page="SELECT role FROM roles";
							if(isset($_POST['role'])){
							$nm_field=$_POST['role'];
							$query="SELECT * FROM roles WHERE role LIKE '%$role%'";
								$query_page="SELECT role FROM roles WHERE role LIKE '%$role%'";
							}
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>

						<tr>
							<!-- <td><?php echo $no++; ?></td> -->
							
							<td><?php echo $rows['id']; ?></td>
							<td><?php echo $rows['role']; ?></td>
							<td>
							<?php
							if ($rows['id']=='1')
							echo "ALL";
							else if ($rows['id']=='2')
							echo "Data Kekaryawanan";
							else if ($rows['id']=='3')
							echo "Data Penggajian";
							/*else if ($rows['id']=='5')
							echo "View";
							else if ($rows['id']=='6')
							echo "Print ID Card";
							
								<center>
									<a href="index.php?tab=datausers&folder=users&file=acl_to_role_data_view&id=<?php echo $rows['id']; ?>" class="btn-small btn btn-warning">
									<i class="icon icon-pencil"></i> View</a>
								</center>
							*/?>	
							</td>
						</tr>
					
						<?php
						}
						?>
						
					</table>

			</div>
		</div> 
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>