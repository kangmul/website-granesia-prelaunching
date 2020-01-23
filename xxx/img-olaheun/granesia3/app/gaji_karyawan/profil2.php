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
			<h3>Detail PJP Tidak Aktif</h3>
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
											WHERE tkjp.index ='".$index."'";
											 
								$query_page="SELECT *
											FROM tkjp
											WHERE tkjp.index ='".$index."'";
							
							
							
							$result=mysql_query($query) or die(mysql_error());
							while($rows=mysql_fetch_array($result)){
							?>
				          
				    <table class="table table-striped table-bordered">
                      <tr class="info">
					  <td colspan="5"><h4><center>Data Pribadi</center></h4></td>
					  <tr>
                             <td rowspan="8">
                               <div align="center">
                                 <?php
									if(empty($rows['foto'])){
											echo "<img src=app/karyawan/karyawan_foto/noimage.jpg width=200 height=300 class=img-rounded>";
										}
										else{
											echo "<img src=app/karyawan/karyawan_foto/$rows[foto] width=200 height=300 class=img-rounded>";
										}
								?>
                                 </div>						</td>
                      </tr>
                      <tr>
                        <!-- <?php echo $no++; ?> -->
                        <td>No Ktp</td>
                        <td><?php echo $rows['no_ktp']; ?></td>
						<td>No Npwp</td>
						<td><?php echo $rows['no_npwp']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td><?php echo $rows['nm_lengkap']; ?></td>
                        <td>No Jamsostek</td>
                        <td><?php echo $rows['no_jamsostek']; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat, Tgl Lahir</td>
                        <td><?php echo $rows['tmp_lahir'].",".$rows['tgl_lahir']; ?></td>
                        <td>Bank DPLK</td>
                        <td><?php echo $rows['bank_dplk']; ?></td>
                      </tr>
                      <tr>
					  
                        <td rowspan="2">Alamat </td>
                        <td rowspan="2"><?php echo $rows['alamat']; ?></td>
                        <td>No Rek DPLK</td>
                        <td><?php echo $rows['no_rek_dplk']; ?></td>
                      </tr>
                      <tr>
                        <td>Bank Payroll</td>
                        <td><?php echo $rows['bank_payroll']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" rowspan="2"></td>
                        <td>NO Rek Payrol</td>
                        <td><?php echo $rows['no_rek_payroll']; ?></td>
                      </tr>
                    </table>
					    <?php
							}
						?>
  </div>
  </div>
  </div>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



