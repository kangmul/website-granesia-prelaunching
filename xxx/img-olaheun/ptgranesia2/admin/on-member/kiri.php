<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Pilihan</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
	
	<!--[if !IE]><!-->
	<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 0px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
	
		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr { 
			display: block; 
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; }
		
		td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}
		
		td:before { 
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%; 
			padding-right: 10px; 
			white-space: nowrap;
		}
		
	
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 500px)
	and (max-device-width : 200px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 320px; }
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: 495px; 
		}
	}
	
	</style>
	<!--<![endif]-->

</head>

<body>

	<div id="page-wrap">

	<table>
		<thead>
		<tr>
			<th>PILIHAN</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><a href="fitur/pilihan/visimisi.php" target="kanan">VISI & MISI</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/sejarah.php" target="kanan">SEJARAH</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/award.php" target="kanan">AWARD</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/resensi.php" target="kanan">RESENSI</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/promotion.php" target="kanan">PROMOTION</a></td>	
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/event.php" target="kanan">EVENT</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/email.php" target="kanan">EMAIL</a></td>
		</tr>
		</tbody>

	</table>
	
	</div>
		
</body>

</html>