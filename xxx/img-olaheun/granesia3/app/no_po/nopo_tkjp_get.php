<?
	isset($_POST['id_no_po_before']) ? $id_no_po_before = $_POST['id_no_po_before'] : $id_no_po_before = '';
	isset($_POST['id_no_po_tujuan']) ? $id_no_po_tujuan = $_POST['id_no_po_tujuan'] : $id_no_po_tujuan = '';
	
	$no_po_before = '';
	
	$result = mysql_query("SELECT * FROM no_po WHERE id_no_po = '$id_no_po_before'") or die(mysql_error());
	while($row=mysql_fetch_array($result)){
		$no_po_before = $row['no_po'];
	}
	
?>

<script type="text/javascript">
<!--
function cek(){ //forzadraco limited user choose more than 2 choice
counter=0;
for(i=1;i<=6;i++){
if(document.getElementById('a'+i).checked==true){
counter++;
}
}
for(i=1;i<=6;i++){
if(counter==2){
if(document.getElementById('a'+i).checked==true){
continue;
}else{
document.getElementById('a'+i).disabled=true;
}
}else{
document.getElementById('a'+i).disabled=false;
}
}
}

function validateText(f){
counter=0;
for(i=1;i<=6;i++){
if(document.getElementById('a'+i).checked==true){
counter++;
}
}
if(f.detail.value.length < 6){
alert('Please fill in your detailed description');
return false;
}else if(counter==0){
alert(' please choose a reason');
return false;
}else{
return true;
}
}
//-->
</script>


<div class="row-fluid">
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
			</div><!--/span-->
			<div class="span9">
				<h4>No. PO : <? echo $no_po_before;?></h4>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
				<div class="well well-sm" style="height:400px; overflow:auto">
			<? $file = "nopo_transfer_tkjp"; $folder = "no_po"; ?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?tab=datatabel&folder=$folder&file=$file";?>">
			<input type='hidden' name='id_no_po_before' value="<? echo $id_no_po_before; ?>">
			<input type='hidden' name='id_no_po_tujuan' value="<? echo $id_no_po_tujuan; ?>">
				<table class="table table-condensed table-bordered">
					<tr class="success">
						<td>NO</td>
						<td>Tandai</td>
						<td><center>NO KTP</center></td>
						<td><center>NAMA</center></td>
						<td><center>STATUS</center></td>
					</tr>
					<?php
							$query="SELECT * FROM tkjp WHERE id_no_po = '$id_no_po_before' ORDER BY nm_lengkap ASC";
							$result=mysql_query($query) or die(mysql_error());
							$jmldata = mysql_num_rows($result);
							$no=1;
							//proses menampilkan data
				while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<td><?php  echo $no; ?></td>
						<td><input type="checkbox" name="id_tkjp[]" value="<?php  echo $rows['index']; ?>" onclick="cek();";></td>
						<td><?php  echo $rows['no_ktp']; ?></td>
						<td><?php  echo $rows['nm_lengkap']; ?></td>
						<td><?php  echo $rows['status']; ?></td>
					</tr>
				<?php  $no++;} ?>
				</table>
			
				</div>
				<div class="control-group">
					<button type="submit" value="OK" class="btn btn-primary">Pindah No PO</button>
				</div>
				<div class="well">
			</form>
				<?php
					echo "Jumlah Data : $jmldata"; ?>
				</div>
				</div>
				<!-- MENAMPILKAN JUMLAH DATA -->
				<!-- END OF MENAMPILKAN JUMLAH DATA -->
			</div>
		