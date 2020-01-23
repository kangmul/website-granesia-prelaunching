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
    $urut = $fungsi->fungsi->urut("tunjangan", "id");
    $query = "INSERT INTO tunjangan (id,id_karyawan,periode,tahun) VALUES ('','$index','$bulan','$tahun')";
	$db->query($query);
    $fungsi->fungsi->redirect('index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_tunjangan_form_insert&id=' .$urut);
} else {
    $query = "SELECT * FROM tunjangan WHERE id=$id LIMIT 1";
    $result = $db->query($query);
    $row = $result->fetch();
    $proses = 'update';

}

$query = "SELECT
  `tunjangan`.`id`,
  `tkjp`.`index`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `tkjp`.`id_jabatan`,
  `tkjp`.`id_gol`,
  `tkjp`.`id_gapok`,
 
  `t_gapok`.`gapok`
FROM
  `tunjangan`
  LEFT JOIN `tkjp` ON `tkjp`.`index` = `tunjangan`.`id_karyawan`
  LEFT JOIN `t_tun_karyawan` ON `tunjangan`.`id` = `t_tun_karyawan`.`id_gaji`
  LEFT JOIN `t_jabatan` ON `tkjp`.`index` = `t_jabatan`.`id_jabatan`
  LEFT JOIN `t_gapok` ON `tkjp`.`id_gapok` = `t_gapok`.`id_gapok`
WHERE
  `tunjangan`.`id` = '".$id."'
GROUP BY
  `t_gapok`.`gapok`";
										
$result = mysql_query($query) or die(mysql_error());

$data = mysql_fetch_array($result) or die(mysql_error());


						//include ('menukaryawan3.php');
					?>

<div class="pull-right">
                    <?php
                   $fungsi->tombol->kembali();
                    ?>

                </div>
				
<div class="row-fluid">
				<div class="span12">
					<form action="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_tunjangan_act_insert" method="post">
						<input type="hidden" name="index" value="<?php echo $data['index']; ?>" />
						<input type="hidden" name="proses" value="<?php echo $proses; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
        				</br>
						<table class="table table-condensed table-striped well">
				
                    <tr class="info">
					  <td colspan="6"><h4><center>FORM INPUT DATA TUNJANGAN</center></h4></td>
					  </tr>
                   
						  <tr>
                            <td><label>Nama : </label></td>
                            <td>
							<input class ="span11" type="text" name="nm_lengkap" id="nm_lengkap" value="<?php echo $data['nm_lengkap'];?>" required/>	</td>							
							 <td><label>NIK : </label></td>
                            <td>
								<input class ="span11" type="text" name="nik" id="nik" value="<?php echo $data['nik'];?>"/>							</td>
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
                          </tr>

                          <tr>
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
							  
                           <td><label>Tunjangan Jabatan : </label></td>
						   <td><select class ="span11" name="tunjab" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_jabatan = $data['id_jabatan'];
									if($id_jabatan =='0' || $id_jabatan ==''){
										echo "<option value='0' selected>-Jabatan- </option>";
										$sql = mysql_query("SELECT * FROM t_jabatan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunjab]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan='$id_jabatan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunjab]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan !='".$id_jabatan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunjab]</option>";
										}
									}
									?>
					          </select>
							  </td>
                           
                             
                           <td><label>Tunjangan Komunikasi : </label></td>
						   <td><select class ="span11" name="tunkom" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_jabatan = $data['id_jabatan'];
									if($id_jabatan =='0' || $id_jabatan ==''){
										echo "<option value='0' selected>-Jabatan- </option>";
										$sql = mysql_query("SELECT * FROM t_jabatan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunkom]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan='$id_jabatan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunkom]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan !='".$id_jabatan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunkom]</option>";
										}
									}
									?>
					          </select>
							  </td>
							  </tr>
                          
                         
                        
						  <tr>
                            <td><label>Tunjangan Dana Taktis : </label></td>
						   <td><select class ="span11" name="tuntak" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_jabatan = $data['id_jabatan'];
									if($id_jabatan =='0' || $id_jabatan ==''){
										echo "<option value='0' selected>-Jabatan- </option>";
										$sql = mysql_query("SELECT * FROM t_jabatan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tuntak]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan='$id_jabatan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tuntak]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan !='".$id_jabatan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tuntak]</option>";
										}
									}
									?>
					          </select>
							  </td>
							  
							  <td><label>Tunjangan Koran : </label></td>
						   <td><select class ="span11" name="tunkor" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_jabatan = $data['id_jabatan'];
									if($id_jabatan =='0' || $id_jabatan ==''){
										echo "<option value='0' selected>-Jabatan- </option>";
										$sql = mysql_query("SELECT * FROM t_jabatan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunkor]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan='$id_jabatan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunkor]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan !='".$id_jabatan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tunkor]</option>";
										}
									}
									?>
					          </select>
							  </td>
								
							<td><label>Tunjangan Makan /Hari : </label></td>
						   <td><select class ="span11" name="tum" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_jabatan = $data['id_jabatan'];
									if($id_jabatan =='0' || $id_jabatan ==''){
										echo "<option value='0' selected>-Jabatan- </option>";
										$sql = mysql_query("SELECT * FROM t_jabatan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tum]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan='$id_jabatan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tum]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan !='".$id_jabatan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tum]</option>";
										}
									}
									?>
					          </select>
							  </td>
						  </tr>
						  <tr>
						  <td><label>Tunjangan Transport /hari : </label></td>
						   <td><select class ="span11" name="tut" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_jabatan = $data['id_jabatan'];
									if($id_jabatan =='0' || $id_jabatan ==''){
										echo "<option value='0' selected>-Jabatan- </option>";
										$sql = mysql_query("SELECT * FROM t_jabatan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tut]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan='$id_jabatan'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tut]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_jabatan where id_jabatan !='".$id_jabatan."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_jabatan]>$data2[tut]</option>";
										}
									}
									?>
					          </select>
							  </td>
							  
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
	<h4>Tambahkan Tunjangan</h4>
<?php
    require_once 'app/gaji_karyawan/detail-njo-form2.php';
    ?>
 
</div>	
	



