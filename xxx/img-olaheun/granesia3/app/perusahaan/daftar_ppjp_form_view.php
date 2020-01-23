<?php
	// koneksi database -------------------------------------------->
	//include('db.php');
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
	
		if(!isset($_POST['nm_perusahaan']) || !isset($_GET['nm_perusahaan']))
		$nm_perusahaan = '';
?>

		<div class="row-fluid">
			<div class="span12">
				<h3> DAFTAR PPJP</h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
					<form name="user_form_search" action="" method="post" class="form-search">
						<input type="text" name="nm_perusahaan" placeholder="Masukkan Pencarian"/>
						<a href='index.php?tab=datatabel&folder=perusahaan&file=daftar_ppjp_form_view' class="btn btn-primary" ><i class='icon-list'></i>All</a>
					</form>
					<!-- END OF FORM PENCARIAN -->
					<!-- MENAMBAHKAN KONFIRMASI JIKA UPDATE DATA BERHASIL -->
					<?php

					if(isset($_SESSION['pesan'])){
						echo $_SESSION['pesan'];
						unset($_SESSION['pesan']);
					}

					?>
				<!-- END OF KONFIRMASI UPDATE DATA -->
				<table class="table table-condensed table-bordered">
					<tr class="success">
					  <td rowspan="2"><div align="center">
					    <p>&nbsp;</p>
					    <p>NO</p>
					  </div></td>
					  <td rowspan="2"><div align="center">
					    <p>&nbsp;</p>
					    <p>NAMA PERUSAHAAN</p>
					  </div></td>
					  <td colspan="3"><div align="center">NOMOR KONTAK </div></td>
					  <td rowspan="2"><div align="center">
					    <p>&nbsp;</p>
					    <p>EMAIL</p>
					  </div></td>
					  <td colspan="3"><div align="center">ALAMAT</div></td>
				  </tr>
					<tr class="success">
						<td><div align="center">TELEPON</div></td>
						<td><div align="center">FAX</div></td>
						<td><div align="center">HP</div></td>
						<td><div align="center">JALAN</div></td>
						<td><div align="center">KOTA</div></td>
						<td><div align="center">KODE POS</div></td>
					</tr>
					<?php
							$batas=10;
							isset($_GET['halaman']) ? $halaman=$_GET['halaman'] : $halaman='';
							$posisi=null;

							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}

							$query="SELECT * FROM perusahaan LIMIT $posisi,$batas";
							$query_page="SELECT nm_perusahaan FROM perusahaan";

							if(isset($_POST['nm_perusahaan'])||isset($_GET['nm_perusahaan'])){
							isset ($_POST['nm_perusahaan']) ? $nm_perusahaan = $_POST['nm_perusahaan'] : $nm_perusahaan = $_GET['nm_perusahaan'];
								
								$query="SELECT * FROM perusahaan WHERE nm_perusahaan LIKE '%$nm_perusahaan%' LIMIT $posisi,$batas";
								$query_page="SELECT * FROM perusahaan WHERE nm_perusahaan LIKE '%$nm_perusahaan%'";
							}
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><div align="center">
						  <?php  echo $no+$posisi; ?>
					    </div></td>
						<!--<td><?php  echo $rows['id_perusahaan']; ?></td>-->
						<td><?php  echo $rows['nm_perusahaan']; ?></td>
						<td><?php  echo $rows['no_telepon']; ?></td>
						<td><?php  echo $rows['fax']; ?></td>
						<td><?php  echo $rows['no_hp']; ?></td>
						<td><?php  echo $rows['email']; ?></td>
						<td><?php  echo $rows['alamat']; ?></td>
						<td><?php  echo $rows['kota']; ?></td>
						<td><?php  echo $rows['kode_pos']; ?></td>
					</tr>
								<?php
				 } ?>
			  </table>
			
					<?php
					$result_page = mysql_query($query_page);
					$jmldata = mysql_num_rows($result_page);
					$jmlhalaman = ceil($jmldata / $batas);
					echo "<div class='pagination'><ul>"; 
					if ($halaman > 1) echo  "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&nm_perusahaan=$nm_perusahaan&halaman=".($halaman-1)."'><< Prev</a></li>";

					
					for($i=1;$i<=$jmlhalaman;$i++){
						
						if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhalaman))
							{
								isset($_GET['showPage']) ? $showPage =$_GET['showPage'] : $showPage='';
								if (($showPage == 1) && ($i != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if (($showPage != ($jmlhalaman - 1)) && ($i == $jmlhalaman))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if ($i == $halaman) echo "<li class='active'><a href='#'>".$i."</a></li>";
									else echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&nm_perusahaan=$nm_perusahaan&halaman=".$i."'>".$i."</a></li>";
								$showPage = $i;
							}
					
					}					
					if ($halaman < $jmlhalaman) echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&nm_perusahaan=$nm_perusahaan&halaman=".($halaman+1)."'>Next >></a></li>";
				echo "</ul>";?>
		  </div>
					
				<!-- MENAMPILKAN JUMLAH DATA -->
				<div class="well">
				<?php
					echo "Jumlah Data : $jmldata"; ?>
				</div>
				<!-- END OF MENAMPILKAN JUMLAH DATA -->
			</div>
		</div>
	
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>