<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
?>

  
					
		<div class="row-fluid">
			
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
				
			</div><!--/span-->
			<div class="span9">
			<h3>Detail NO PO Tidak Aktif</h3>
<?php
//$nik = isset($_GET['nik']) ? $_GET['nik'] : null;
$id_no_po = isset($_GET['id_no_po']) ? $_GET['id_no_po'] : null;
?>

<a href="index.php?tab=datatabel&folder=no_po&file=nopo_history_data_view" class="btn  btn-success">
<i class="icon icon-arrow-left"></i> Kembali</a>


<div class="row-fluid">
			<div class="span12">

</div>
</div>
	<div class="row-fluid">	
		
		  <?php
						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}
						?>
				      
				        <?php
						
						$id_no_po = isset($_GET['id_no_po']) ? $_GET['id_no_po'] : null;
							
							
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
											
											WHERE  no_po.id_no_po ='".$id_no_po."'";
											 
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
											FROM tkjp
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan 
												  LEFT JOIN fpemegang_kontrak ON no_po.id_fpemegang_kontrak = fpemegang_kontrak.id
												  LEFT JOIN tkjp ON tkjp.id_no_po = no_po.id_no_po
											
											WHERE no_po.id_no_po ='".$id_no_po."'";
							
							
							
							$result=mysql_query($query) or die(mysql_error());
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>
				
   <div class="span7">
				   <table class="table table-striped table-bordered">
                    <tr class="info">
					  <td colspan="2"><h4><center>Data Detail No PO Tidak Aktif</center></h4></td>
					  </tr>
					<tr>
                        <td>NO PO</td>
                        <td><?php echo $rows['no_po']; ?></td>
                      </tr>
					   <tr>
                        <td>Judul Kontrak</td>
                        <td><?php echo $rows['judul_kontrak']; ?></td>
                      </tr>
					<tr>
                        <td>Nama Perusahaan</td>
                        <td><?php echo $rows['nm_perusahaan']; ?></td>
                      </tr>
					 <tr>
                        <td>Pemegang Kontrak</td>
                        <td><?php echo $rows['fungsi']; ?></td>
                      </tr>
					
                      <tr>
                        <!-- <?php echo $no++; ?> -->
                        <td>Jumlah PJP</td>
                        <td><?php echo $rows['jumlah_pjp']; ?></td>
                      </tr>
                      <tr>
                        <td>Awal Kontrak</td>
                        <td><?php  
						if (empty($rows['awal_kontrak']))
						 echo $rows['awal_kontrak'];
						 else
						echo date('d-m-Y',strtotime($rows['awal_kontrak'])); 
						?></td>
                      </tr>
                     <tr>
                        <td>Akhir Kontrak</td>
                        <td><?php  if (empty($rows['ahir_kontrak']))
						 echo $rows['ahir_kontrak'];
						 else
						echo date('d-m-Y',strtotime($rows['ahir_kontrak']));?></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td><?php  echo $rows['status_nopo']; ?></td>
                      </tr>
                      
                    </table>
					</div>
				  
				              <?php
							}
						?>
					</div>
					</div>
					</div>
				              <!-- END OF MENAMPILKAN JUMLAH DATA -->
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



