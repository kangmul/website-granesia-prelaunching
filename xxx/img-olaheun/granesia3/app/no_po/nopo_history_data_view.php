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
				<?php  include "app/menutabel.php"; ?>
			</div><!--/span-->
			<div class="span9">
				<h3> NO PO Tidak Aktif</h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
					<form method="post" class="form-search">
						<input type="text" name="no_po" placeholder="Masukkan Pencarian"/>
						<a href='index.php?tab=datatabel&folder=karyawan&file=karyawan_history_data_view' class="btn btn-primary" ><i class='icon-list'></i>All</a>
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
				<table class="table table-striped table-bordered">
					<tr>
						<th width="5px">NO</th>
						<th width="40px">NO PO</th>
						<th width="150px">Nama Perusahaan</th>
						<th width="30px">Status</th>
						<th width="80px">Aksi</th>
					</tr>
					<?php
							$batas=10;
							isset($_GET['halaman'])?$halaman=$_GET['halaman'] : $halaman='';
							$posisi=null;


							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}

							$query="SELECT 
							no_po.id_no_po as id_no_po,
							no_po.no_po as no_po,
							no_po.status_nopo as status_nopo,
							perusahaan.nm_perusahaan as nm_perusahaan
							FROM no_po 
							LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
							where status_nopo = 'nonaktif' ORDER BY no_po LIMIT $posisi,$batas";
							$query_page="SELECT
							no_po.id_no_po as id_no_po,
							no_po.no_po as no_po,
							no_po.status_nopo as status_nopo,
							perusahaan.nm_perusahaan as nm_perusahaan
							FROM no_po 
							LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
							where status_nopo = 'nonaktif' ";

							if(isset($_POST['no_po'])||isset($_GET['no_po'])){
							isset ($_POST['no_po']) ? $no_po = $_POST['no_po'] : $no_po = $_GET['no_po'];
							
								$klasifikasi=$_POST['no_po'];
								$query="SELECT
								no_po.id_no_po as id_no_po,
							no_po.no_po as no_po,
							no_po.status_nopo as status_nopo,
							perusahaan.nm_perusahaan as nm_perusahaan
							FROM no_po 
							LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
							WHERE no_po LIKE '%$no_po%' and status_nopo = 'nonaktif' ";
								$query_page="SELECT
								no_po.id_no_po as id_no_po,
							no_po.no_po as no_po,
							no_po.status_nopo as status_nopo,
							perusahaan.nm_perusahaan as nm_perusahaan
							FROM no_po 
							LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
							WHERE no_po LIKE '%$no_po%' and status_nopo = 'nonaktif' ";
							}

							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr>
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<td><?php  echo $rows['no_po']; ?></td>
						<td><?php  echo $rows['nm_perusahaan']; ?></td>
						<td><?php  echo $rows['status_nopo']; ?></td>
						<td>
						
								<div class="btn-group">
								<a href="index.php?tab=datatabel&folder=no_po&file=nopo_act_update_stat&id_no_po=<?php echo $rows['id_no_po']; ?>&stat=<?php echo $rows['status_nopo']; ?>"
								class="btn-small btn btn-danger">
								<i class="icon icon-ok"></i> Aktifkan Kembali</a>
											
									
								<a href="index.php?tab=datatabel&folder=no_po&file=nopo_act_delete&id_no_po=<?php echo $rows['id_no_po']; ?>" 
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
								<i class="icon icon-trash"></i> Delete</a>
								
								<a href="index.php?tab=datatabel&folder=no_po&file=detail_nopo&id_no_po=<?php echo $rows['id_no_po']; ?>" 
								class="btn-small btn btn-info">
								<i class="icon icon-search"></i> Detail</a>
								</div>
									
						
						</td>
					</tr>
								<?php } ?>
					
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