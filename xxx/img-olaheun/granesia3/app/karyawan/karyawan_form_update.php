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

$index = isset($_GET['index']) ? $_GET['index'] : null;
$query = "SELECT * FROM tkjp WHERE tkjp.index ='".$index."'";
										
$result = mysql_query($query) or die(mysql_error());

$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='2')){?>


 				<h3>UPDATE PJP</h3>
				
				<?php
				include ('menukaryawan.php');
				?>
<div class="row-fluid">
				<div class="span12">
					<form action="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_act_update" method="post" id="form_update" name="form_update" enctype="multipart/form-data">
						<input type="hidden" name="index" value="<?php echo $data['index']; ?>" />
						<input type="hidden" name="foto_before" value="<?php echo $data['foto']; ?>" />
						<input type="hidden" name="perjanjian_krj_before" value="<?php echo $data['perjanjian_krj']; ?>" />
						
						<table class="table table-condensed table-striped well">
				
                    <tr class="info">
					  <td colspan="6"><h4><center>Form Update PJP</center></h4></td>
					  </tr>
                    <tr>
					  <td colspan="6">Profil Karyawan</td>
					  </tr>
						  <tr>
                            <td><label>Nama : </label></td>
                            <td>
							<input class ="span11" type="text" name="nm_lengkap" id="nm_lengkap" value="<?php echo $data['nm_lengkap'];?>" required/>	</td>							
							 <td><label>NIK: </label></td>
                            <td>
								<input class ="span11" type="text" name="nik" id="nik" value="<?php echo $data['nik'];?>"/>							</td>
                            <td><label>Foto Profil : </label></td>
                            <td><input type="file" name="foto" id="foto" value="<?php echo $data['foto'];?>"/>							</td>
                           
                          </tr>

                          <tr>
                            <td><label>No KTP Karyawan : </label></td>
                            <td>
								<input class ="span11" type="text" name="no_ktp" id="no_ktp" value="<?php echo $data['no_ktp'];?>"/>							</td>
                          
                            <td><label>No NPWP : </label></td>
                            <td>
								<input class ="span11" type="text" name="no_npwp" id="no_npwp" value="<?php echo $data['no_npwp'];?>"/>							</td>
                         
                            <td><label>No JAMSOSTEK : </label></td>
                            <td>
								<input class ="span11" type="text" name="no_jamsostek" id="no_jamsostek" value="<?php echo $data['no_jamsostek'];?>"/>								</td>
                          </tr>
                          
                          <tr>
                            <td>BANK PAYROLL </td>
                            <td><input class ="span11" type="text" name="bank_payroll" id="bank_payroll" value="<?php echo $data['bank_payroll'];?>"/></td>
                          
                            <td><label>NO REK PAYROLL: </label></td>
                            <td>
								<input class ="span11" type="text" name="no_rek_payroll" id="no_rek_payroll" value="<?php echo $data['no_rek_payroll'];?>"/>							</td>
                           <td></td>
                            <td></td>
                          
						  </tr>
						  <tr>
                            <td><label>Alamat: </label></td>
                            <td>
								<textarea class ="span11" type="text" name="alamat" id="alamat" ><?php echo $data['alamat'];?></textarea>							</td>
                          
                            <td><label>Tempat Lahir: </label></td>
							<td><input class ="span11" type="text" name="tmp_lahir" id="tmp_lahir" value="<?php echo $data['tmp_lahir'];?>" required/></td>
							<td><label>Tanggal Lahir: </label></td>
                            <td>
								
								
								<input class ="span11" type="text" name="tgl_lahir" id="tgl_lahir" value="<?php echo $data['tgl_lahir'];?>" required/>
								<!-- Load jQuery and bootstrap datepicker scripts -->
									<script src="asset/js/jquery.min.js"></script>
									<script src="asset/js/bootstrap-datepicker.js"></script>
									<script type="text/javascript">
										// When the document is ready
										$(document).ready(function () {
									
											$('#tgl_lahir').datepicker({
												format: "yyyy-mm-dd"
											});  
								
										});
									</script>							</td>
                          
                            
                          </tr>
                          
                        
						  <tr>
                            <td><label>Nama Pekerjaan : </label></td>
                            <td>
								<input class ="span11" type="text" name="nm_pekerjaan" id="nm_pekerjaan" value="<?php echo $data['nm_pekerjaan'];?>"/>								</td>
                          
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
								<td><label>TMT MASA KERJA: </label></td>
                            <td>
								<input class ="span11" type="text" name="tmt" id="tmt" value="<?php echo $data['tmt'];?>" required/>	
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
						  
						  
						  <tr>
						  
							  
						    <tr><td>Relasi Kerja </td> <td></td><td></td><td></td><td></td><td></td></tr>
							<tr>
						    <td> Field: </td>
							<td><select name="id_field" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_field = $data['id_field'];
									if($id_field =='0' || $id_field ==''){
										echo "<option value='0' selected>-Field- </option>";
										$sql = mysql_query("SELECT * FROM field");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_field]>$data2[nm_field]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM field where id_field='$id_field'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_field]>$data2[nm_field]</option>";
										}
										$sql = mysql_query("SELECT * FROM field where id_field !='".$id_field."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_field]>$data2[nm_field]</option>";
										}
									}
									?>
					          </select>
							  </td>
							
							<td> Fungsi kerja: </td>
					        <td><select name="id_fkerja" onchange='javascript:dinamis(this)'>
                                <?php 
										$id_fkerja = $data['id_fkerja'];
										//$id_fpemegang_kontrak = $data['id_fpemegang_kontrak'];
								
									if($id_fkerja =='0' || $id_fkerja ==''){
										echo "<option value='0' selected>-Fungsi Kerja- </option>";
										$sql = mysql_query("SELECT * FROM fungsi_kerja");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_fkerja]>$data2[fkerja]</option>";
										}
									}
									else {
										$sql = mysql_query("SELECT * FROM fungsi_kerja
									where fungsi_kerja.id_fkerja ='".$id_fkerja."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_fkerja]>$data2[fkerja]</option>";
										}
										$sql = mysql_query("SELECT * FROM fungsi_kerja 
									where fungsi_kerja.id_fkerja !='$id_fkerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_fkerja]>$data2[fkerja]</option>";
										}
									}
									?>
                              </select>
							 </td>
							 <td>Lokasi: </td>
							<td><select name='id_lks_kerja' onchange='javascript:dinamis(this)'>
                                <?php 
										
										$id_lks_kerja = $data['id_lks_kerja'];
									if($id_lks_kerja =='0' || $id_lks_kerja ==''){
										echo "<option value='0' selected>-Lokasi Kerja- </option>";
										$sql = mysql_query("SELECT * FROM lokasi_kerja");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_lks_kerja]>$data2[lokasi]</option>";
										}
									}
									else {
										$sql = mysql_query("SELECT * FROM lokasi_kerja
										WHERE id_lks_kerja='$id_lks_kerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_lks_kerja]>$data2[lokasi]</option>";
										}
										$sql = mysql_query("SELECT * FROM lokasi_kerja
										 WHERE id_lks_kerja != '$id_lks_kerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_lks_kerja]>$data2[lokasi]</option>";
										}
									}
									?>
                              </select>
							  </td>
							  </tr>
							<tr>
					        <td>Status Pekerjaan</td>
                            <td><select name='id_klasifikasi' onchange='javascript:dinamis(this)'>
                                <?php 
										$id_klasifikasi = $data['id_klasifikasi'];
									if($id_klasifikasi =='0' || $id_klasifikasi ==''){
										echo "<option value='0' selected>-klasifikasi- </option>";
										$sql = mysql_query("SELECT * FROM klasifikasi");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_klasifikasi]>$data2[klasifikasi]</option>";
										}
									}
									else {
										$sql = mysql_query("SELECT * FROM klasifikasi WHERE id_klasifikasi='$id_klasifikasi'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_klasifikasi]>$data2[klasifikasi]</option>";
										}
										$sql = mysql_query("SELECT * FROM klasifikasi  WHERE id_klasifikasi != '$id_klasifikasi'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_klasifikasi]>$data2[klasifikasi]</option>";
										}
									}
									?>
                              </select>
							  </td>
							  
                            <td>Sistem kerja </td>
                              <td><select name="id_sistem_kerja" onchange='javascript:dinamis(this)'>
                                <?php 
										$id_sistem_kerja = $data['id_sistem_kerja'];
									if($id_sistem_kerja =='0' || $id_sistem_kerja ==''){
										echo "<option value='0' selected>-Sistem Kerja- </option>";
										$sql = mysql_query("SELECT * FROM sistem_kerja");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_sistem_kerja]>$data2[waktu]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM sistem_kerja WHERE id_sistem_kerja ='$id_sistem_kerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_sistem_kerja]>$data2[waktu]</option>";
										}
										$sql = mysql_query("SELECT * FROM sistem_kerja  WHERE id_sistem_kerja != '$id_sistem_kerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_sistem_kerja]>$data2[waktu]</option>";
										}
									}
									?>
                              </select>
                           </td>
						   <td>Golongan </td>
						    <td><select name="id_gol" onchange='javascript:dinamis(this)'>
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
					      </tr>
					      <tr>
						  
							  
							  <td>Gaji Pokok </td>
						    <td><select name="id_gapok" onchange='javascript:dinamis(this)'>
						        <?php 
										$id_gapok = $data['id_gapok'];
									if($id_gapok =='0' || $id_gapok ==''){
										echo "<option value='0' selected>-Gaji Pokok- </option>";
										$sql = mysql_query("SELECT * FROM t_gapok");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_gapok]>$data2[gapok]</option>";
										}
									}
									else {
									$sql = mysql_query("SELECT * FROM t_gapok where id_gapok='$id_gapok'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_gapok]>$data2[gapok]</option>";
										}
										$sql = mysql_query("SELECT * FROM t_gapok where id_gapok !='".$id_gapok."'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_gapok]>$data2[gapok]</option>";
										}
									}
									?>
					          </select>
							  </td>
							  <td></td><td></td><td></td><td></td>
							  </tr>
                         
						 
                          	<input type="hidden" name="status" id="status" value="<?php echo $data['status'];?> "/>
							<input type="hidden" name="created_by" value="<?php echo $data['created_by'];?> "/>
							<input type="hidden" name="tanggal_dibuat" value="<?php echo $data['tanggal_dibuat'];?> "/>
                        </table>

                     
						
						
						<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>
			 	     
					 	  <div class="control-group">
							<button type="submit" class="btn btn-primary">
								<i class="icon icon-plus"></i> Update
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

