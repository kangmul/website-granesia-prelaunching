<?php empty( $file ) ? header('location:../index.php') : '' ;?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: 12px;
}
-->
</style>
	<div class="row-fluid">
        <!--<div class="span9">
			<?php //include "slide.php";?>
			</br>
			</br>
		<div class="well well-sm">
		<li class="nav-header text-center" style="font-size:12px; color:red;"><strong></strong></li>
		
			<?php //include ('konten_bawah.php'); ?>
		</div>
		</div>-->

		<div class="span3">
			<?php if(isset($_SESSION['role_id'])){?>
				<div class="well well-sm" style="height:150px; overflow:auto">
				<ul class="nav nav-pills nav-stacked">
					<li class="nav-header" style="font-size:12px; color:red; "><strong>Karyawan Memasuki Masa Pensiun</strong></li>
						<?php

							$query = "SELECT * FROM tkjp
								WHERE 20454 - datediff( CURDATE( ) , tgl_lahir ) <=90 ORDER BY tkjp.nm_lengkap ASC";
								$query_page= $query;
								
								$result_page = mysql_query($query_page);
								$jmldata = mysql_num_rows($result_page);

							if ($jmldata < 1)
							{
								echo "Tidak ada yang memasuki masa pensiun";
							}
								if ($jmldata > 0)
								{
								
								$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($row=mysql_fetch_array($result)){
								?>
				
					<li><a href="index.php?tab=datakaryawan&folder=karyawan&file=profil&index=<?php echo $row['index'];?>"><?php echo $row['nm_lengkap'].' ('.$row['fungsi'].') ';?></a></li>
				<?php			}
				}?>
				
				</ul>
				</div>
				</div>
				
				<!--<div class="well well-sm" style="height:100px; overflow:auto">
				<ul class="nav nav-pills nav-stacked">
					<li class="nav-header" style="font-size:12px; color:red; "><strong>No PO Memasuki Akhir Kontrak</strong></li>
						<?php

							
								$query = "SELECT * FROM no_po LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
								WHERE datediff(  ahir_kontrak , awal_kontrak )  <=150";
								$query_page= $query;
								
								$result_page = mysql_query($query_page);
								$jmldata = mysql_num_rows($result_page);

							if ($jmldata < 1)
							{
								echo "Tidak ada yang memasuki massa akhir kontrak";
							}
								if ($jmldata > 0)
								{	
								$result=mysql_query($query) or die(mysql_error());
								
								$no=0;
								//proses menampilkan data
								while($row=mysql_fetch_array($result)){
								?>
				
					<li><label class="warning"><?php echo $row['no_po'].' / '.$row['nm_perusahaan'];?></label></li>
				<?php }
				}?>
				</ul>
				</div>-->
				
			<?php	} else
				{
			
					include ('login.php');
				}
				?>
			<!--<div class="well well-sm" style="height:100px; overflow:auto">
			<ul class="nav nav-pills nav-stacked">
					<li class="nav-header" style="font-size:12px; color:red;"><strong>link terkait</strong></li>
						<?php
						$query="SELECT * FROM link_terkait ";
								$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<li><a href="<?php  echo $rows['tag_link']; ?>"><?php  echo $rows['nama_link']; ?></a></li>
				<?php } ?>
			  </ul>
			</div>
		</div>
	</div>
