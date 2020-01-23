<?
	isset($_POST['id_tkjp'])? $id_tkjp = $_POST['id_tkjp'] : $id_tkjp = null;
		$counter = 0;
		
		isset($_POST['id_no_po_tujuan'])? $id_no_po_tujuan = $_POST['id_no_po_tujuan'] : $id_no_po_tujuan = '';
		isset($_POST['id_no_po_before'])? $id_no_po_before = $_POST['id_no_po_before'] : $id_no_po_before = '';
		
		$result1 = mysql_query("SELECT * FROM no_po WHERE id_no_po = '$id_no_po_tujuan'") or die(mysql_error());
		$result2 = mysql_query("SELECT * FROM no_po WHERE id_no_po = '$id_no_po_before'") or die(mysql_error());
		
		$no_po_tujuan = '';
		$no_po_before = '';
		$id_fpemegang_kontrak = '';
		
		while($row = mysql_fetch_array($result1)){
			$no_po_tujuan = $row['no_po'];
			$id_fpemegang_kontrak = $row['id_fpemegang_kontrak'];
		}
		
		while($row = mysql_fetch_array($result2)){
			$no_po_before = $row['no_po'];
		}
		
		for($i = 0;$i<count($id_tkjp);$i++){
			$id = $id_tkjp[$i];
			$sql = " UPDATE test.tkjp SET tkjp.id_no_po = '$id_no_po_tujuan',tkjp.id_fpemegang_kontrak = '$id_fpemegang_kontrak' WHERE tkjp.index = '$id'";
			
			$sukses = mysql_query($sql) or die(mysql_error());
			
			if($sukses){
				$counter += 1;
			}
		}
		
		if($counter > 0){
			$_SESSION['pesan'] = '<p><div class="alert alert-success">'.$counter.' Data pegawai berhasil dipindah dari No PO.'.$id_no_po_before.' ke No PO.'.$id_no_po_tujuan.'</b> </b></div></p>';
		}
		$st='1';
		include ('nopo_data_view.php');
?>