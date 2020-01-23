<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;
	
	$nik = isset($_GET['nik']) ? $_GET['nik'] : null;

	if(isset($_SESSION['role_id'])){
		?>
		<div class="row-fluid">
			
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
				
			</div><!--/span-->
			<div class="span9">
			<h3>Relasi Kerja PJP Tidak Aktif</h3>
<?php
//$nik = isset($_GET['nik']) ? $_GET['nik'] : null;
$index = isset($_GET['index']) ? $_GET['index'] : null;
?>

<a href="index.php?tab=datatabel&folder=karyawan&file=karyawan_history_data_view" class="btn  btn-success">
<i class="icon icon-arrow-left"></i> Kembali</a>

</br></br>
<div class="row-fluid">
			<div class="span12">
<ul class="nav nav-pills">
	<li <?php echo $file=='profil2'?'class="active"':'';?>><a href="index.php?tab=datatabel&folder=karyawan&file=profil2&index=<?php echo $_GET['index']; ?>">Profil </a></li>
	<li <?php echo $file=='relasikerja2'?'class="active"':'';?>><a href="index.php?tab=datatabel&folder=karyawan&file=relasikerja2&index=<?php echo $_GET['index']; ?>">Relasi Kerja</a></li>
	
	
</ul>
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
						
						$index = isset($_GET['index']) ? $_GET['index'] : null;
							
							
							$query="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
											
											WHERE  tkjp.index ='".$index."'";
											 
								$query_page="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
											
											WHERE tkjp.index ='".$index."'";
							
							
							
							$result=mysql_query($query) or die(mysql_error());
						
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>
				
   <div class="span7">
				   <table class="table table-striped table-bordered">
                    <tr class="info">
					  <td colspan="2"><h4><center>Data Relasi Pekerjaan</center></h4></td>
					  </tr>
					<tr>
                        <td>Field</td>
                        <td><?php echo $rows['nm_field']; ?></td>
                      </tr>
					   <tr>
                        <td>Pemegang kontrak</td>
                        <td><?php echo $rows['fungsi']; ?></td>
                      </tr>
					<tr>
                        <td>Fungsi kerja</td>
                        <td><?php echo $rows['fkerja']; ?></td>
                      </tr>
					 <tr>
                        <td>Lokasi kerja</td>
                        <td><?php echo $rows['lokasi']; ?></td>
                      </tr>
					
                      <tr>
                        <!-- <?php echo $no++; ?> -->
                        <td>Klasifikasi</td>
                        <td><?php echo $rows['klasifikasi']; ?></td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td><?php echo $rows['nm_pekerjaan']; ?></td>
                      </tr>
                     <tr>
                        <td>System kerja</td>
                        <td><?php echo $rows['waktu']; ?></td>
                      </tr>
                      <tr>
                        <td>Perusahaan</td>
                        <td><?php echo $rows['nm_perusahaan']; ?></td>
                      </tr>
                      <tr>
                        <td>No po</td>
                        <td><?php echo $rows['no_po']; ?></td>
                      </tr>
                      <tr>
                        <td>Awal Kontrak Kerja</td>
                        <td><?php echo $rows['awal_kontrak']; ?></td>
                      </tr>
                      <tr>
                        <td>Akhir Kontrak Kerja</strong>
                            </p></td>
                        <td><?php echo $rows['ahir_kontrak']; ?></td>
                      </tr>
					  <tr>
                        <td>TMT</strong>
                            </p></td>
                        <td><?php echo $rows['tmt']; ?></td>
                      </tr>
                      <tr>
                        <td>Judul kontrak</td>
                        <td><?php echo $rows['judul_kontrak']; ?></td>
                      </tr>
                    </table>
					</div>
				   </div>
				   </div>
				   </div>
				              <?php
							}
						?>
				              <!-- END OF MENAMPILKAN JUMLAH DATA -->
      
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



