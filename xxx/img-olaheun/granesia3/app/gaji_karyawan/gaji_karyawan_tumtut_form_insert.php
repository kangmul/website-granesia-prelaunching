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
    $urut = $fungsi->fungsi->urut("tumtut", "id");
    $query = "INSERT INTO tumtut (id,id_karyawan,periode,tahun) VALUES ('','$index','$bulan','$tahun')";
	$db->query($query);
    $fungsi->fungsi->redirect('index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_tumtut_form_insert&id=' .$urut);
} else {
    $query = "SELECT * FROM tumtut WHERE id=$id LIMIT 1";
    $result = $db->query($query);
    $row = $result->fetch();
    $proses = 'update';

}

$query = "SELECT
  `tumtut`.`id`,
  `tkjp`.`index`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `tkjp`.`nm_pekerjaan`,
  `tkjp`.`id_jabatan`,
  `tkjp`.`id_gol`,
  `tkjp`.`id_gapok`,
  `tkjp`.`id_klasifikasi`,
  `tkjp`.`id_lks_kerja`,
  `tkjp`.`id_sistem_kerja`,
  `t_gapok`.`gapok`
FROM
  `tumtut`
  LEFT JOIN `tkjp` ON `tkjp`.`index` = `tumtut`.`id_karyawan`
  LEFT JOIN `t_lem_karyawan` ON `tumtut`.`id` = `t_lem_karyawan`.`id_gaji`
  LEFT JOIN `t_jabatan` ON `tkjp`.`index` = `t_jabatan`.`id_jabatan`
  LEFT JOIN `t_gapok` ON `tkjp`.`id_gapok` = `t_gapok`.`id_gapok`
  WHERE
  `tumtut`.`id` = '".$id."'
GROUP BY
  `t_gapok`.`gapok`";
  
					
$result = mysql_query($query) or die(mysql_error());

$data = mysql_fetch_array($result) or die(mysql_error());

//$gapok = $data['gapok'];
//$total = $data['jml'];

//$sisa_gaji = $gapok - $total;

						//include ('menukaryawan3.php');
					?>

<div class="pull-right">
                    <?php
                   $fungsi->tombol->kembali();
                    ?>

                </div>
				
<div class="row-fluid">
				<div class="span12">
					<form action="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_tumtut_act_insert" method="post">
						<input type="hidden" name="index" value="<?php echo $data['index']; ?>" />
						<input type="hidden" name="proses" value="<?php echo $proses; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
        				</br>
						<table class="table table-condensed table-striped well">
				
                    <tr class="info">
					  <td colspan="6"><h4><center>FORM INPUT DATA TUMTUT KARYAWAN</center></h4></td>
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
                           <td>Status Kekaryawanan : </td>
						    <td><select class ="span11" name="status_karyawan" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_klasifikasi = $data['id_klasifikasi'];
									if($id_klasifikasi =='0' || $id_klasifikasi ==''){
										echo "<option value='0' selected>-Status Kekaryawanan- </option>";
										$sql = mysql_query("SELECT * FROM klasifikasi");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_klasifikasi]>$data2[klasifikasi]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM klasifikasi where id_klasifikasi='$id_klasifikasi'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_klasifikasi]>$data2[klasifikasi]</option>";
										}
										$sql = mysql_query("SELECT * FROM klasifikasi where id_klasifikasi !='".$id_klasifikasi."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_klasifikasi]>$data2[klasifikasi]</option>";
										}
									}
									?>
					          </select>
							  </td>
							  </tr>
                          
                         
                        
						  <tr>
                            <td>Sistem Kerja : </td>
						    <td><select class ="span11" name="sistem_kerja" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_sistem_kerja = $data['id_sistem_kerja'];
									if($id_sistem_kerja =='0' || $id_sistem_kerja ==''){
										echo "<option value='0' selected>->Sistem Kerja- </option>";
										$sql = mysql_query("SELECT * FROM sistem_kerja");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_sistem_kerja]>$data2[waktu]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM sistem_kerja where id_sistem_kerja='$id_sistem_kerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_sistem_kerja]>$data2[waktu]</option>";
										}
										$sql = mysql_query("SELECT * FROM sistem_kerja where id_sistem_kerja !='".$id_sistem_kerja."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_sistem_kerja]>$data2[waktu]</option>";
										}
									}
									?>
					          </select>
							  </td>
							  
							  <td>Lokasi Kerja : </td>
						    <td><select class ="span11" name="lokasi_kerja" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_lks_kerja = $data['id_lks_kerja'];
									if($id_lks_kerja =='0' || $id_lks_kerja ==''){
										echo "<option value='0' selected>->Sistem Kerja- </option>";
										$sql = mysql_query("SELECT * FROM lokasi_kerja");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_lks_kerja]>$data2[lokasi]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM lokasi_kerja where id_lks_kerja='$id_lks_kerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_lks_kerja]>$data2[lokasi]</option>";
										}
										$sql = mysql_query("SELECT * FROM lokasi_kerja where id_lks_kerja !='".$id_lks_kerja."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_lks_kerja]>$data2[lokasi]</option>";
										}
									}
									?>
					          </select>
							  </td>
							  <td><label>Nama Pekerjaan: </label></td>
                            <td>
								<input class ="span11" type="text" name="sisa_gaji" id="sisa_gaji" value="<?php echo $data['nm_pekerjaan'];?>"/>						</td>
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
							<td></td>
							<td></td>
							
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
	<h4>Tambahkan Lembur</h4>
<?php
    require_once 'app/gaji_karyawan/detail-njo-form4.php';
    ?>
 
</div>	
	



