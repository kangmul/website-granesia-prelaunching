<?php empty( $f ) ? header('location:../index.php') : '' ;

$tanggal_awal = isset($_POST['tanggal_awal']) ? $_POST['tanggal_awal'] : null;
$tanggal_akhir = isset($_POST['tanggal_akhir']) ? $_POST['tanggal_akhir'] : null;
		
if(!isset($_POST['tanggal_awal'])){
		$tanggal_awal = date("01-m-Y"); }

if(!isset($_POST['tanggal_akhir'])){
		$tanggal_akhir = date("d-m-Y"); }
		
$t_awal = date('Y-m-d', strtotime($tanggal_awal));
$t_akhir = date('Y-m-d', strtotime($tanggal_akhir));
		
	

	include ('db.php');
	
	$querystatus="SELECT alat.id_alat,nm_kategori,nm_alat,serial_number,nm_vendor,
										COUNT(tanggal) as jumlah, 
										SUM(IF(hasil_periksa = 'TIDAK', 1, 0)) AS hasiltidak,
										SUM(IF(hasil_periksa = 'YA', 1, 0)) AS hasilya  
										
									FROM periksa 
									Left Join alat ON alat.id_alat = periksa.id_alat 
									Left Join kategori ON kategori.id = alat.kategori 
									Left Join nama_vendor ON nama_vendor.id = alat.id_vendor 
									WHERE 1 AND tanggal BETWEEN '$t_awal' AND '$t_akhir' "; 
	
	$result = mysql_query($querystatus); 
	$rows=mysql_fetch_array($result);
	
	
	$jml = $rows['jumlah'];
	if ($jml=='')
		$jml = 0;
		
	$y = $rows['hasilya'];
	if ($y =='')
		$y= 0;
	
	$t = $rows['hasiltidak'];
	if ($t == '')
		$t= 0;
	
	
	
	$querysudahperiksa="SELECT * FROM pengawas_alat left join alat on alat.id_alat = pengawas_alat.id_alat 
							Left Join periksa ON periksa.id_alat = pengawas_alat.id_alat
							left join user ON user.id = pengawas_alat.id_pengawas  
							WHERE 1 AND tanggal BETWEEN '$t_awal' AND '$t_akhir' "; 
	$resultsudahperiksa = mysql_query($querysudahperiksa); 
	$rowssudahperiksa=mysql_fetch_array($resultsudahperiksa);
	$jmlsudahperiksa = mysql_num_rows($resultsudahperiksa);
	
	
	$querybedaperiksa ="SELECT * FROM periksa WHERE id_pengawas != id_pemeriksa  
					 AND tanggal BETWEEN '$t_awal' AND '$t_akhir' "; 
					
	$resultbedaperiksa = mysql_query($querybedaperiksa); 
	$jmldata = mysql_num_rows($resultbedaperiksa);
	$rowsbedaperiksa=mysql_fetch_array($resultbedaperiksa);
	$jmlbedaperiksa = mysql_num_rows($resultbedaperiksa);
	
	if($y == 0 || $jml == 0 ) 
		$ya = 0;
	else
	$ya = ($y / $jml ) * 100 ;
	
	if($t == 0 || $jml == 0 ) 
		$tidak = 0;
	else
	$tidak = ($t / $jml ) *  100;
	
	
	$jmlpengawaspemeriksa = $jmlsudahperiksa - $jmlbedaperiksa;
	
	if($jmlpengawaspemeriksa == 0 ) 
		$jmlpengawas = 0;
	else	
	$jmlpengawas = ($jmlpengawaspemeriksa / $jmlsudahperiksa ) * 100;
	
	if($jmlbedaperiksa == 0 ) 
		$jmlpemeriksa = 0;
	else
	$jmlpemeriksa = ($jmlbedaperiksa / $jmlsudahperiksa ) * 100;
	
	
?>


 <div class="main">
	<h1 class="page-header">Charts</h1>
			
<div class="page-content">


<form method="post" action="index.php?t=stats&f=stats">
<label>Pilih Periode </label>
					</br>
					<div class="row">
						<div class="col-xs-2">
						<input type="text"  onchange="this.form.submit()" 
						class="form-control" name="tanggal_awal" id="tanggal_awal" placeholder="TANGGAL AWAL" value ="<?php echo $tanggal_awal ?>">
							<!-- Load jQuery and bootstrap datepicker scripts -->
									<script type="text/javascript">
										// When the document is ready
										$(document).ready(function () {
											$('#tanggal_awal').datepicker({
												format: "dd-mm-yyyy"
											});  
								
										});
									</script>
						</div>
					
					
						<div class="col-xs-2">
						<input type="text" onchange="this.form.submit()" class="form-control" 
						name="tanggal_akhir" id="tanggal_akhir" placeholder="TANGGAL AKHIR" 
						value ="<?php echo $tanggal_akhir ?>">
									<script type="text/javascript">
										// When the document is ready
										$(document).ready(function () {
											$('#tanggal_akhir').datepicker({
												format: "dd-mm-yyyy"
											});  
								
										});
									</script>
						</div>
					</div>
					</form>
    	<div class="row">
		  
		  <div class="col-md-12">

  		
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Charts</div>
				</div>

					<?php
					
				
				
				if (strtotime($tanggal_akhir) < strtotime($tanggal_awal) )
						$_SESSION['pesan'] = '<p><div class="alert alert-danger">kesalahan dalam tanggal</div></p>';
				else {
				?>
					
  				<div class="panel-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div id="hero-bar" style="height: 230px;"></div>
							
							<div class="col-md-6">
							<ul class="nav nav-pills nav-stacked">
								<ul class="list-group">
									
									<li class="list-group-item">
									<span class="badge"><?php echo $jmlsudahperiksa; ?></span>
												1. Sudah Periksa
									</li>
									
									<li class="list-group-item">
									<span class="badge"><?php echo $y; ?></span>
												2. Status Ya
									</li>
									<li class="list-group-item">
									<span class="badge"><?php echo $t; ?></span>
												3. Status Tidak
									</li>
									<li class="list-group-item">
									<span class="badge"><?php echo $jmlbedaperiksa; ?></span>
												4. Beda pemeriksa
												
									</li>
								</ul>
							</ul>
							</div>
  						</div>
  						<div class="col-md-3">
  							<div id="hero-donut" style="height: 230px;"></div>
  						</div>
  						<div class="col-md-3">
  							<div id="hero-donut2" style="height: 230px;"></div>
  						</div>
  					</div>
  				</div>
				
				<?php } 
				
				if(isset($_SESSION['pesan'])){
					echo $_SESSION['pesan'];
					unset($_SESSION['pesan']);
				}
				?>
  			</div>
			
		  </div>
		  
			
			
		</div>
		
		
			
			
			
    </div>
</div>

 <script type="text/javascript">
// Morris Bar Chart
Morris.Bar({
    element: 'hero-bar',
    data: [
        {device: '1 ', sells: <?php echo $jmlsudahperiksa; ?>},
        {device: '2 ', sells: <?php echo $y; ?>},
        {device: '3 ', sells: <?php echo $t; ?>},
        {device: '4 ', sells: <?php echo $jmlbedaperiksa; ?>},
            ],
    xkey: 'device',
    ykeys: ['sells'],
    labels: ['Total'],
    barRatio: 0.4,
    xLabelMargin: 10,
    hideHover: 'auto',
    barColors: ["#3d88ba"]
});


// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut',
    data: [
        {label: 'Sudah Periksa', value: <?php echo $jmlpengawas; ?> },
        {label: 'Belum Periksa', value: <?php echo $jmlpemeriksa; ?> }
    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut2',
    data: [
        {label: 'Status Ya', value: <?php echo $ya; ?> },
        {label: 'Status Tidak', value: <?php echo $tidak; ?> },
       ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});
</script>   
   
    <?php //<script src="js/stats.js"></script> ?>
