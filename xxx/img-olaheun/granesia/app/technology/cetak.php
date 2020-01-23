<?php 
	
	include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $f ) ? header('location:../../index.php') :
	'' ;
	
if(isset($_GET['t'])){?>
	
<div class="main">
	<div class="container-fluid">
		<div class="row" style="height:8px; background-color:blue;" ></div>
			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-3">
						<?php include "menudata3.php";?>	
					</div>
			
					<div class="col-lg-9">
						<div class="panel panel-primary col-lg-12">
							<h3 class="page-header">CETAK</h3>
							<img src="img/cetak.jpg"></img>
							</br></br>
							<p> Dalam proses cetak, selain memiliki sejumlah mesin cetak WEB untuk keperluan penerbitan pers baik didalam maupun diluar Group Pikiran Rakyat, Kami juga memiliki sejumlah mesin Sheetfed untuk keperluan cetakan komersial (commercial printing) dengan beragam ukuran sesuai keinginan dan pesanan dari konsumen.
							Dengan dukungan sumber daya manusia yang berpengalaman, menjadikan kualitas dan hasil cetak prima.</p>
							<img src="img/Prod_gal.jpg" width="400" height="400" style="float:right;"></img>
							</br></br>
						</div>	
					</div>	
				</div>	
			</div>	
	</div>	
</div>				
<?php
	} 
?>
