<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;
	
	$index = isset($_GET['index']) ? $_GET['index'] : null;

	if(isset($_SESSION['role_id'])){
?>


					<h3>Detail PJP</h3>
				   
				      
				              
						<?php
						include ('menukaryawan.php');
						?>
  <div class="row-fluid">

  <?php

						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}
						?>  
				        <?php
							/*
							//$index = isset($_GET['index']) ? $_GET['index'] : null;
							$query="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN pekerjaan ON tkjp.id_pekerjaan = pekerjaan.id_pekerjaan
											LEFT JOIN perusahaan ON tkjp.id_perusahaan = perusahaan.id_perusahaan
											LEFT JOIN no_po ON perusahaan.id_no_po = no_po.id_no_po
											
											WHERE tkjp.index ='".$index."'";
											 
								$query_page="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN pekerjaan ON tkjp.id_pekerjaan = pekerjaan.id_pekerjaan
											LEFT JOIN perusahaan ON tkjp.id_perusahaan = perusahaan.id_perusahaan
											LEFT JOIN no_po ON perusahaan.id_no_po = no_po.id_no_po
											
											WHERE tkjp.index ='".$index."'";
							
							
							$result=mysql_query($query) or die(mysql_error());
							
							while($rows=mysql_fetch_array($result)){
							*/
						?>
    
					<table class="table table-condensed table-striped well">
                     
                      <tr>
                        <td rowspan="2">Serrtifikat Dan Personal File</td>
                        <td>&nbsp;<?php
							$query2="SELECT * FROM 
											 berkas_sertifikat
											 where id_karyawan ='".$index."'";
							$query_page2="SELECT * FROM berkas_sertifikat";	
							$result2=mysql_query($query2) or die(mysql_error());
							
							echo "<ul>";
							while($rows2=mysql_fetch_array($result2)){ ?>
							<?php if(check_user("karyawan","delete",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
								<a href="index.php?tab=datakaryawan&folder=karyawan
								&file=sertifikat_act_delete&index=<?php echo $index;?>
								&sertifikat=<?php echo $rows2['sertifikat']; ?>" 
				onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="icon icon-trash pull-right"></a>
							<?php } ?>
											<li><a href="app/karyawan/pdf/<?php echo $rows2['sertifikat']?>" class="tooltipsku" 
											data-toogle="tooltip" data-placement="bottom">
											<?php
											echo $rows2['sertifikat'];?></a></li> 
																		
								<?php }
							echo "</ul>";
							?>
							<script src="asset/js/jquery.min.js"></script>
							<script src="asset/js/bootstrap.js"></script>
							<script type="text/javascript">
								$(function () {
								$(".tooltipsku").tooltip();
								});
							</script>							</td>
                      </tr>
                    </table>
				    <p>
				      <?php if(check_user("karyawan","upload_berkas",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>

	<form action="app/karyawan/sertifikat_act_insert.php?index=<?php echo $_GET['index']; ?>" class="dropzone">
	</form>
						<?php 
						} 
						?>
		              <!-- END OF MENAMPILKAN JUMLAH DATA -->
                    </p>
  </div>
<?php
	} 
	else 
	{
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



