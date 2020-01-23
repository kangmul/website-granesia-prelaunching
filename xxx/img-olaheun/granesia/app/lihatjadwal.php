<?php
include ('../db.php');
//$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : null;
$id_alat = isset($_POST['id']) ? $_POST['id'] : null;
$rowsnmalat= mysql_fetch_array(mysql_query("Select * From alat where id_alat = '$id_alat' "));

echo "Nama Alat : ".$rowsnmalat['nm_alat']; 

?>
	
	<script>
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
		
		<div class="panel panel-info">
		 <div class="panel-body">
				<table class="table table-condensed" id="example">
					<thead>
					<tr class="success">
						<td>NO</td>
						<td>Periode Alat</td>
						<td>Status Alat</td>
					</thead>
					</tr>
		<?php 
		$posisi=null;
		$query="SELECT * FROM jadwal
		where id_alat = '$id_alat' ";
							
		$result=mysql_query($query) or die(mysql_error());
		$no=0;

		$jmldata = mysql_num_rows($result);
		if ($jmldata == '0')
		{
				echo "</br>Tidak Terjadwal";
		}							//proses menampilkan data
		while ($rows=mysql_fetch_array($result)) { ?>
			<tr>
				<!-- <td><?php  echo $no++; ?></td> -->
				<td><?php  echo $no+$posisi; ?></td>
				<td><?php echo $rows['tanggal']." s.d ".$rows['tanggal1']; ?></td>
				<td><?php echo $rows['status_periksa']; ?></td>
				
			</tr>
		<?php } ?>
		</table>
</div>
</div>