<?php
	// koneksi database -------------------------------------------->
	//include('db.php');
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
		?>
<?php  if($_SESSION['role_id'] =='1'){ ?>
					<h3> Detail History </h3>

				<a href="index.php?tab=datahistory&folder=history&file=history_form_view" class="btn  btn-success">
								<i class="icon icon-arrow-left"></i> Kembali</a>
				</br>
				</br>
						<?php

						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}

						?>
						<!-- END OF KONFIRMASI UPDATE DATA -->
						
						<?php
							$id_his = isset($_GET['id_his']) ? $_GET['id_his'] : null;
							
							$query="SELECT * FROM history where id_his ='$id_his'";
							$result=mysql_query($query) or die(mysql_error());
						?>
						<table class="table table-bordered">
						<?php	
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
							echo "<tr><td>Create Date</td><td>$rows[create_date]</td></tr>
								  <tr> <td>User</td><td>$rows[user]</td></tr>
								  <tr><td>Modul</td><td>$rows[modul]</td></tr>
								  <tr><td>Data Awal</td><td>$rows[data_awal]</td></tr>
									<tr><td>Data Akhir</td><td>$rows[data_akhir]</td></tr>
									 <tr><td>Link</td><td><a href=$rows[link]>$rows[link]</a></td></tr>
									 <tr><td>Ket</td><td>$rows[ket]</td></tr>";
							}
						?>
						</table>
						<?php
							//set sudah dibaca = Y kalau sudah dibaca
							mysql_query("UPDATE history SET status_baca='Y' WHERE id_his='$id_his'");
						?>
<?php  } ?>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



