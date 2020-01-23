<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	if(isset($st)){
		include('config.php');
	}
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
		?>
		
<? if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='2')){?>
<? if(!isset($_POST['no_po']) || !isset($_GET['no_po'])) $no_po = '';?>


		
		<div class="row-fluid">
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
			</div><!--/span-->
			
			<div class="span4">
			<a href="index.php?tab=datatabel&folder=no_po&file=nopo_data_view" class="btn  btn-success">
<i class="icon icon-arrow-left"></i> Kembali</a>
				<h3>Pilih No PO Asal</h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					
					<? isset($_GET['id_no_po'])? $id_no_po = $_GET['id_no_po'] : $id_no_po = '';?>
					<? $file = "nopo_tkjp_get";
						$folder = "no_po";
					?>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?tab=datatabel&folder=$folder&file=$file";?>">
						<input type='hidden' name='id_no_po_tujuan' value="<? echo $id_no_po; ?>">
						<select name="id_no_po_before" onChange='javascript:dinamis(this)' required> <option value=''>- NO PO -</option>
															<?php 
																
																$sql = mysql_query("SELECT * FROM no_po WHERE id_no_po != '$id_no_po'");
																while ($data=mysql_fetch_array($sql))
																{
																	echo "<option value=$data[id_no_po]>$data[no_po] - $data[judul_kontrak]</option>";
																}
															?>
														</select>
						<div class="control-group">
						</br>
							<input type="submit" class="btn btn-primary" value="Lanjut">
						</div>
						</form>
					
				<!-- MENAMPILKAN JUMLAH DATA -->
				
				<!-- END OF MENAMPILKAN JUMLAH DATA -->
			</div>
			<div class="span4">
				<?php  include "app/no_po/nopo_data_view_bahan.php"; ?>
			</div><!--/span-->
		</div>
		
		
<?}
else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>