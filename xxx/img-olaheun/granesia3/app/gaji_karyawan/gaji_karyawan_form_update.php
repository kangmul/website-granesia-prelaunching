<script type='text/javascript'>

	var xmlhttp = createRequestObject();

	function createRequestObject() {
		var ro;
		var browser = navigator.appName;
		if(browser == "Microsoft Internet Explorer"){
			ro = new ActiveXObject("Microsoft.XMLHTTP");
		}else{
			ro = new XMLHttpRequest();
		}
		return ro;
	}

	function dinamis2(combobox)
	{
		var kode = combobox.value;
		
		if (!kode) return;
		xmlhttp.open('get', 'app/karyawan/getid_fpemegang_kontrak.php?kode='+kode, true);
		xmlhttp.onreadystatechange = function() {
			if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
			{
				document.getElementById("tampil_pemegang_kontrak").value = xmlhttp.responseText;
			}
			return false;
		}
		xmlhttp.send(null);
	}
</script>

<?php
//include ('db.php');
include ('config.php');

$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : date ('m');
$id = isset($_GET['id']) ? $_GET['id'] : null;
$query = "

SELECT * FROM
  `gaji`
  LEFT JOIN `t_potongan` ON `gaji`.`nm_pot1` = `t_potongan`.`id_potongan` AND
  `gaji`.`nm_pot2` = `t_potongan`.`id_potongan` AND `gaji`.`nm_pot3` = `t_potongan`.`id_potongan`
  LEFT JOIN `tkjp` ON `tkjp`.`index` = `gaji`.`id_karyawan` WHERE hps=0 AND id = '$id'";

										
$result = mysql_query($query) or die(mysql_error());

$data = mysql_fetch_array($result) or die(mysql_error());


empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if($_SESSION['role_id']=='1'){?>


 				<?php
				include ('menukaryawan.php');
				?>
<div class="row-fluid">
				
				<div class="span12">
					<form action="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_act_insert" method="post" id="form_insert" name="form_insert" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
						
						<table class="table table-condensed table-striped well">
				
                    <tr class="info">
					  <td colspan="6"><h4><center>FORM UPDATE DATA GAJI KARYAWAN</center></h4></td>
					  </tr>
                   
						  <tr>
                            <td><label>Nama : </label></td>
                            <td>
							<input class ="span11" type="text" name="nm_lengkap" id="nm_lengkap" value="<?php echo $data['nm_lengkap'];?>" required/>	</td>							
							 <td><label>NIK : </label></td>
                            <td>
								<input class ="span11" type="text" name="nik" id="nik" value="<?php echo $data['nik'];?>"/>							</td>
                            <td><label>NO REK PAYROLL : </label></td>
                            <td>
								<input class ="span11" type="text" name="no_rek_payroll" id="no_rek_payroll" value="<?php echo $data['no_rek_payroll'];?>"/>							</td>
                           
                          </tr>

                          <tr>
                           <td><label>Jabatan : </label></td>
                            <td>
								<input class ="span11" type="text" name="jabatan" id="jabatan" value="<?php echo $data['jabatan'];?>"/></td>
                             <td>Golongan : </td>
						    <td><select class ="span11" name="id_gol" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_gol = $data['id_gol'];
									if($id_gol =='0' || $id_gol ==''){
										echo "<option value='0' selected>-Golongan- </option>";
										$sql = mysql_query("SELECT * FROM t_golongan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_gol]>$data2[nama_gol]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_golongan where id_gol='$id_gol'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_gol]>$data2[nama_gol]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_golongan where id_gol !='".$id_gol."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_gol]>$data2[nama_gol]</option>";
										}
									}
									?>
					          </select>
							  </td>
                           <td>Gaji Pokok : </td>
						    <td><select class ="span11" name="gapok" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_gapok = $data['id_gapok'];
									if($id_gapok =='0' || $id_gapok ==''){
										echo "<option value='0' selected>-Gaji Pokok- </option>";
										$sql = mysql_query("SELECT * FROM t_gapok");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[gapok]>$data2[gapok]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_gapok where id_gapok='$id_gapok'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[gapok]>$data2[gapok]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_gapok where id_gapok !='".$id_gapok."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[gapok]>$data2[gapok]</option>";
										}
									}
									?>
					          </select>
							  </td>
							  </tr>
                          
                          
						  <tr>
                           <td><select class ="span11" name="nm_pot1" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_potongan = $data['id_potongan'];
									if($id_potongan =='0' || $id_potongan ==''){
										echo "<option value='0' selected>- Potongan I - </option>";
										$sql = mysql_query("SELECT * FROM t_potongan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_potongan where id_potongan='$id_potongan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_potongan where id_potongan !='".$id_potongan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
									}
									?>
					          </select>
							  </td>
                            <td>
								<input class ="span11" type="text" name="pot_1" id="pot_1" placeholder="0" value="<?php echo $data['pot_1'];?>">							</td>
                          
                            <td><select class ="span11" name="nm_pot2" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_potongan = $data['id_potongan'];
									if($id_potongan =='0' || $id_potongan ==''){
										echo "<option value='0' selected>- Potongan II - </option>";
										$sql = mysql_query("SELECT * FROM t_potongan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_potongan where id_potongan='$id_potongan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_potongan where id_potongan !='".$id_potongan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
									}
									?>
					          </select>
							  </td>
							<td><input class ="span11" type="text" name="pot_2" id="pot_2" placeholder="0" value="<?php echo $data['pot_2'];?>"></td>
							<td><select class ="span11" name="nm_pot3" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_potongan = $data['id_potongan'];
									if($id_potongan =='0' || $id_potongan ==''){
										echo "<option value='0' selected>- Potongan III - </option>";
										$sql = mysql_query("SELECT * FROM t_potongan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_potongan where id_potongan='$id_potongan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_potongan where id_potongan !='".$id_potongan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_potongan]>$data2[nama_potongan]</option>";
										}
									}
									?>
					          </select>
							  </td>
                            
								
								
								<td><input class ="span11" type="text" name="pot_3" id="pot_3" placeholder="0" value="<?php echo $data['pot_3'];?>"></td>
							
                          
                            
                          </tr>
                          
                        
						  <tr>
                            
                          
                            <td><label>Periode Bulan : </label></td>
                            <td> <?php echo $fungsi->fungsi->filter_bulan($bulan, "bulan"); ?>
							  </td>
								<td><label>Tanggal Input : </label></td>
                            <td>
								<input class ="span11" type="text" name="tgl_input" id="tgl_input" value="<?php echo date("Y-m-d"); echo date(" H:i:s");?>" required/>	
							<script src="asset/js/jquery.min.js"></script>
									<script src="asset/js/bootstrap-datepicker.js"></script>
									<script type="text/javascript">
										// When the document is ready
										$(document).ready(function () {
									
											$('#tmt').datepicker({
												format: "yyyy-mm-dd"
											});  
								
										});
									</script>								</td>
							<td><!--<label>Sisa Gaji : </label>--></td>
                            <td>
								<!--<input class ="span11" type="text" name="sisa_gaji" id="sisa_gaji" placeholder="0"/>-->								</td>
                          </tr>
						  
						  
						  
                         
						 
                          	
                        </table>

                     
						
						
						<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>
			 	     
					 	  <div class="control-group">
							<button type="submit" class="btn btn-primary">
								<i class="icon icon-plus"></i> Simpan
							</button>
							<button type="reset" class="btn btn-warning">
								<i class="icon icon-refresh"></i> Batal
							</button>
						</div>
					</form>
	
				</div>
   <!--<div class="span4">
				<?php  include "app/no_po/nopo_data_view_bahan.php"; ?>
	</div>-->
	
</div>	

<?php
}  
else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>
<?php 
}
else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>

