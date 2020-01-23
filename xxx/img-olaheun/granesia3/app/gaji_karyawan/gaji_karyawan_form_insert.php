<?php
//include ('db.php');
//include ('config.php');

$proses = 'tambah';
$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : date ('m');
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : date ('Y');
$index = isset($_POST['index']) ? $_POST['index'] : null;
$id = isset($_GET['id']) ? $id = $_GET['id'] : '';
//$index = isset($_GET['index']) ? $_GET['index'] : null;
$id = isset($_GET['id']) ? $id = $_GET['id'] : '';
if ($id == '') {
    $urut = $fungsi->fungsi->urut("gaji", "id");
    $query = "INSERT INTO gaji (id,id_karyawan,periode,tahun) VALUES ('','$index','$bulan','$tahun')";
	$db->query($query);
    $fungsi->fungsi->redirect('index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_form_insert&id=' .$urut);
} else {
    $query = "SELECT * FROM gaji WHERE id=$id LIMIT 1";
    $result = $db->query($query);
    $row = $result->fetch();
    $proses = 'update';

}

$query = "SELECT
  `gaji`.`id`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `tkjp`.`id_jabatan`,
  `tkjp`.`id_gol`,
  `tkjp`.`id_gapok`,
  Sum(`t_pot_karyawan`.`jumlah`) AS `jml`,
  `t_gapok`.`gapok`
FROM
  `gaji`
  LEFT JOIN `tkjp` ON `tkjp`.`index` = `gaji`.`id_karyawan`
  LEFT JOIN `t_pot_karyawan` ON `gaji`.`id` = `t_pot_karyawan`.`id_gaji`
  LEFT JOIN `t_gapok` ON `tkjp`.`id_gapok` = `t_gapok`.`id_gapok`
WHERE
  `gaji`.`id` = '".$id."'
GROUP BY
  `t_gapok`.`gapok`";
										
$result = mysql_query($query) or die(mysql_error());

$data = mysql_fetch_array($result) or die(mysql_error());

$gapok = $data['gapok'];
$total = $data['jml'];

$sisa_gaji = $gapok - $total;

						//include ('menukaryawan3.php');
					?>

<div class="pull-right">
                    <?php
                   $fungsi->tombol->kembali();
                    ?>

                </div>
				
<div class="row-fluid">
				<div class="span12">
					<form action="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_act_insert" method="post">
						<input type="hidden" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" />
						<input type="hidden" name="proses" value="<?php echo $proses; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
        				</br>
						<table class="table table-condensed table-striped well">
				
                    <tr class="info">
					  <td colspan="6"><h4><center>FORM INPUT DATA GAJI KARYAWAN</center></h4></td>
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
						   <td><select class ="span11" name="id_jabatan" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_jabatan = $data['id_jabatan'];
									if($id_jabatan =='0' || $id_jabatan ==''){
										echo "<option value='0' selected>-Jabatan- </option>";
										$sql = mysql_query("SELECT * FROM t_jabatan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[nm_jabatan]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan='$id_jabatan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[nm_jabatan]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan !='".$id_jabatan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[nm_jabatan]</option>";
										}
									}
									?>
					          </select>
							  </td>
                           
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
							<td><label>Sisa Gaji : </label></td>
                            <td>
								<input class ="span11" type="text" name="sisa_gaji" id="sisa_gaji" value="<?php echo $sisa_gaji;?>"/>						</td>
                          </tr>
                        </table>

                     
						
				</div>
				
						
						<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>
			 	     </br>
				</br>
					 	  <div class="control-group">
							<button type="submit" class="btn btn-primary">
								<i class="icon icon-plus"></i> Simpan
							</button>
							<button type="reset" class="btn btn-warning">
								<i class="icon icon-refresh"></i> Batal
							</button>
							<strong style="font-size:20px">&nbsp;Tekan F5 Sebelum Di Simpan</strong>
						</div>
					</form>
	<h4>Tambahkan Potongan</h4>
<?php
    require_once 'app/gaji_karyawan/detail-njo-form.php';
    ?>
 
</div>	
	



