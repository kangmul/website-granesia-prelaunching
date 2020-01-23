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
							<h3 class="page-header">PRACETAK</h3>
							<img src="img/pra_cetak.jpg">
							</br></br>
							<p> Dalam proses pracetak, mulai dari pembuatan desain, setting, layout, pengolahan foto, semuanya sudah Kami proses secara digital dengan menggunakan komputer (komputerisasi), sehingga memungkinkan Kami bisa bekerja lebih cepat, tepat, dan teratur.
							Sarana perangkat lainnya yang Kami miliki sebagai pendukung kualitas hasil kerja pracetak diantaranya image setter, Scanner Hell, Plate Maker, Printer Laser untuk prooffing dan sejumlah komputer yang telah dikalibrasi.
							</p>
							<img src="img/operator ctcp.jpg" width="400" height="400" style="float:right;">	
						</div>	
					</div>	
				</div>				
			</div>				
	</div>				
</div>				
<?php
	} 
?>
