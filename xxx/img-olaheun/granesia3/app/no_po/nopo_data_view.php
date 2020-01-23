<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	if(isset($st)){
		include('config.php');
	}
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
		?>
		
<? if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='2')){?>
<? if(!isset($_POST['no_po']) || !isset($_GET['no_po'])) $no_po = '';?>

		
		<div class="row-fluid">
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
			</div><!--/span-->
			<div class="span9">
				<h3>No. PO</h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
					<form method="post" class="form-search">
						<input type="text" name="no_po" placeholder="Masukkan No PO"/>
						<a href='index.php?tab=datatabel&folder=no_po&file=nopo_data_view' class="btn btn-primary" ><i class='icon-list'></i>All</a>
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
						<td>NO</td>
						<td>No PO</td>
						<td><center>JUDUL KONTRAK</center></td>
						<td><center>NAMA PERUSAHAAN</center></td>
						<td><center>PEMEGANG KONTRAK</center></td>
						<td><center>JUMLAH PJP</center></td>
						<td><center>AWAL KONTRAK</center></td>
						<td><center>AHIR KONTRAK</center></td>
						<td><center>AKSI</center></td>
					</tr>
					<?php
							$batas=10;
							isset($_GET['halaman'])? $halaman=$_GET['halaman'] : $halaman='';
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
											no_po.judul_kontrak as judul_kontrak,
											no_po.awal_kontrak as awal_kontrak,
											no_po.ahir_kontrak as ahir_kontrak,
											no_po.status_nopo as status_nopo,
											perusahaan.nm_perusahaan as nm_perusahaan,
											fpemegang_kontrak.fungsi as fungsi,
											count(tkjp.index) as jumlah_pjp
											
												FROM no_po 
											      LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan 
												  LEFT JOIN fpemegang_kontrak ON no_po.id_fpemegang_kontrak = fpemegang_kontrak.id
												  LEFT JOIN tkjp ON tkjp.id_no_po = no_po.id_no_po
										WHERE no_po.status_nopo = 'aktif' and tkjp.status ='aktif'
										GROUP BY no_po.id_no_po
										ORDER BY no_po.id_no_po ASC LIMIT $posisi,$batas";
							$query_page="SELECT 
											no_po.id_no_po as id_no_po,
											no_po.no_po as no_po,
											no_po.judul_kontrak as judul_kontrak,
											no_po.awal_kontrak as awal_kontrak,
											no_po.ahir_kontrak as ahir_kontrak,
											no_po.status_nopo as status_nopo,
											perusahaan.nm_perusahaan as nm_perusahaan,
											fpemegang_kontrak.fungsi as fungsi,
											count(tkjp.index) as jumlah_pjp
											FROM no_po 
											      LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan 
												  LEFT JOIN fpemegang_kontrak ON no_po.id_fpemegang_kontrak = fpemegang_kontrak.id
												  LEFT JOIN tkjp ON tkjp.id_no_po = no_po.id_no_po
											WHERE no_po.status_nopo = 'aktif' and tkjp.status ='aktif'
											GROUP BY no_po.id_no_po
											";
											

							//if(isset($_POST['no_po'])){
								//$no_po=$_POST['no_po'];
							if(isset($_POST['no_po'])||isset($_GET['no_po'])){
							isset ($_POST['no_po']) ? $no_po = $_POST['no_po'] : $no_po = $_GET['no_po'];
								
							$query="SELECT 
											no_po.id_no_po as id_no_po,
											no_po.no_po as no_po,
											no_po.judul_kontrak as judul_kontrak,
											no_po.awal_kontrak as awal_kontrak,
											no_po.ahir_kontrak as ahir_kontrak,
											no_po.status_nopo as status_nopo,
											perusahaan.nm_perusahaan as nm_perusahaan,
											fpemegang_kontrak.fungsi as fungsi,
											count(tkjp.index) as jumlah_pjp
										FROM no_po 
											      LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan 
												  LEFT JOIN fpemegang_kontrak ON no_po.id_fpemegang_kontrak = fpemegang_kontrak.id
												  LEFT JOIN tkjp ON tkjp.id_no_po = no_po.id_no_po
										WHERE no_po LIKE '%$no_po%' and status_nopo = 'aktif' and tkjp.status ='aktif'
										GROUP BY no_po.id_no_po
										ORDER BY no_po.id_no_po ASC
										LIMIT $posisi,$batas";
								$query_page="SELECT 
												
												no_po.id_no_po as id_no_po,
												no_po.no_po as no_po,
												no_po.judul_kontrak as judul_kontrak,
												no_po.awal_kontrak as awal_kontrak,
												no_po.ahir_kontrak as ahir_kontrak,
												no_po.status_nopo as status_nopo,
												perusahaan.nm_perusahaan as nm_perusahaan,
												fpemegang_kontrak.fungsi as fungsi,
												count(tkjp.index) as jumlah_pjp
											 FROM no_po 
											      LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan 
												  LEFT JOIN fpemegang_kontrak ON no_po.id_fpemegang_kontrak = fpemegang_kontrak.id
												  LEFT JOIN tkjp ON tkjp.id_no_po = no_po.id_no_po
										WHERE no_po LIKE '%$no_po%' and status_nopo = 'aktif' and tkjp.status ='aktif'
										GROUP BY no_po.id_no_po";
							}


							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
							$id_no_po = $rows['id_no_po'];
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<!--<td><?php  echo $rows['id_no_po']; ?></td>-->
						<td><?php  echo $rows['no_po']; ?></td>
						<td><?php  echo $rows['judul_kontrak']; ?></td>
						<td><?php  echo $rows['nm_perusahaan']; ?></td>
						<td><?php  echo $rows['fungsi']; ?></td>
						<td><?php  echo $rows['jumlah_pjp']; ?></td>
						<td><?php  
						if (empty($rows['awal_kontrak']))
						 echo $rows['awal_kontrak'];
						 else
						echo date('d-m-Y',strtotime($rows['awal_kontrak'])); 
						?></td>
						<td><?php  if (empty($rows['ahir_kontrak']))
						 echo $rows['ahir_kontrak'];
						 else
						echo date('d-m-Y',strtotime($rows['ahir_kontrak']));?></td>
						
						<td>
							
							<div class="btn-group">
							<a href="index.php?tab=datatabel&folder=no_po&file=nopo_tkjp_form_pilih&id_no_po=<?php  echo $id_no_po; ?>" class="btn-small btn btn-success">
								<i class="icon icon-plus"></i> Input PJP</a>
							<a href="index.php?tab=datatabel&folder=no_po&file=nopo_form_update&id_no_po=<?php  echo $rows['id_no_po']; ?>" class="btn-small btn btn-warning">
								<i class="icon icon-pencil"></i> Update</a>
								<? if($_SESSION['role_id']=='1') {?>
							<a href="index.php?tab=datatabel&folder=no_po&file=nopo_act_delete_nonaktif&id_no_po=<?php  echo $rows['id_no_po']; ?>"
								onclick="return confirm('Apakah anda yakin akan menonaktifkan data ini?')" class="btn-small btn btn-danger">
								<i class="icon icon-trash"></i> Nonaktif</a>
								<?}?>
							</div>
						</td>
						
					</tr>
								<?php } ?>
					<? if($_SESSION['role_id']=='1') {?>
						<tr class="info">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a href="index.php?tab=datatabel&folder=no_po&file=nopo_form_insert" class="btn  btn-success"><i class="icon icon-plus"></i> Add</a>
						</td>
					</tr>
					<?}?>
				</table>
					<?php
					$result_page = mysql_query($query_page);
					$jmldata = mysql_num_rows($result_page);
					$jmlhalaman = ceil($jmldata / $batas);
					echo "<div class='pagination'><ul>"; 
					if ($halaman > 1) echo  "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&no_po=$no_po&halaman=".($halaman-1)."'><< Prev</a></li>";

					
					for($i=1;$i<=$jmlhalaman;$i++){
						if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhalaman))
							{
								isset($_GET['showPage']) ? $showPage =$_GET['showPage'] : $showPage=''; 
								if (($showPage == 1) && ($i != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if (($showPage != ($jmlhalaman - 1)) && ($i == $jmlhalaman))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if ($i == $halaman) echo "<li class='active'><a href='#'>".$i."</a></li>";
									else echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&no_po=$no_po&halaman=".$i."'>".$i."</a></li>";
								$showPage = $i;
							}
					
					}					
					if ($halaman < $jmlhalaman) echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&no_po=$no_po&halaman=".($halaman+1)."'>Next >></a></li>";
				echo "</ul>";
				?>
				</div>
				<!-- MENAMPILKAN JUMLAH DATA -->
				<div class="well">
				<?php
					echo "Jumlah Data : $jmldata"; ?>
				</div>
				<!-- END OF MENAMPILKAN JUMLAH DATA -->
			</div>
		</div><?}  
else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>