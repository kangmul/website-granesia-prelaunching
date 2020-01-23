<?php
	// koneksi database -------------------------------------------->
	//include('db.php');
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
		?>
		
</script>
<?php  if(check_user("history","view",$_SESSION['index'],$_SESSION['role_id'])){ ?>
<?php if(!isset($_POST['modul']) || !isset($_GET['modul'])) $modul = '';?>

		<div class="row-fluid">
		<? include ('menuhistory.php');?>
			
				<h3> History</h3>
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
				<table class="table table-condensed table-striped">
						<tr>
						<th>NO</th>
						<th>Tanggal Aksi</th>
						<th>Oleh</th>
						<th>Modul</th>
						<th>Data Awal</th>
						<th>Perubahan Data</th>
						<th>Ket</th>
						<th>baca</th>
					
					</tr>
					<?php
							$batas=10;
							isset($_GET['halaman']) ? $halaman = $_GET['halaman'] : $halaman ='';
														
							$posisi=null;

							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}

							$query="SELECT * FROM history where status_baca = 'Y'ORDER BY id_his  DESC LIMIT $posisi,$batas";
							$query_page="SELECT * FROM history";

							//if(isset($_POST['modul'])){
								//$klasifikasi=$_POST['modul'];
							

							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<?php if($rows['status_baca'] == 'Y'){?>
						<tr class="success"> <?}
						else { ?>
						<tr class="warning"> <?} ?>
						
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<!--<td><?php  echo $rows['id_his']; ?></td>-->
						<td><?php  echo $rows['create_date']; ?></td>
						<td><?php  echo $rows['user']; ?></td>
						<td><?php  echo $rows['modul']; ?></td>
						<td><?php  echo $rows['data_awal']; ?></td>
						<td><?php  echo $rows['data_akhir']; ?></td>
						<td><?php  echo $rows['ket']; ?></td>
						<td>
										<?php if($rows['status_baca'] == 'N'){
										//$hal=$_GET['halaman'];
										isset($_GET['halaman']) ? $hal = $_GET['halaman'] : $hal ='';
										
										?>
										
										
											
											<a href="index.php?tab=datahistory&folder=history&file=history_act_update_stat&id_his=<?php echo $rows['id_his']; ?>&halaman=<? echo $hal;?>" class="tooltipsku" 
											data-toogle="tooltip" data-placement="bottom" title ="Tandai sudah di baca">
											<i class="icon icon-trash"></i></a>
										<?php }else if($rows['status_baca'] == 'Y'){?>
											<span class="icon icon-ok"></span>
									<?}?>
										<a href="index.php?tab=datahistory&folder=history&file=history_detail_view&id_his=<?php echo $rows['id_his']; ?>">
											<i class="icon-zoom-in"></i></a>
						</td>
					</tr>
								<?php } ?>
					
				</table>
					<?php
					$result_page = mysql_query($query_page);
					$jmldata = mysql_num_rows($result_page);
					$jmlhalaman = ceil($jmldata / $batas);
					echo "<div class='pagination'><ul>"; 
					if ($halaman > 1) echo  "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&modul=$modul&halaman=".($halaman-1)."'><< Prev</a></li>";

					
					for($i=1;$i<=$jmlhalaman;$i++){
						if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhalaman))
							{
								isset($_GET['showPage']) ? $showPage =$_GET['showPage'] : $showPage=''; 
								if (($showPage == 1) && ($i != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if (($showPage != ($jmlhalaman - 1)) && ($i == $jmlhalaman))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if ($i == $halaman) echo "<li class='active'><a href='#'>".$i."</a></li>";
									else echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&modul=$modul&halaman=".$i.">".$i."</a></li>";
								$showPage = $i;
							}
					
					}					
					if ($halaman < $jmlhalaman) echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&modul=$modul&halaman=".($halaman+1).">Next >></a></li>";
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
	
<?php  } ?>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>