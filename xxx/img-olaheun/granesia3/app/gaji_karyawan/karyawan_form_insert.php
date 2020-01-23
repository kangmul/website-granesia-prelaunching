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
// koneksi database -------------------------------------------->
//include('db.php');
include('config.php');
//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if(check_user("karyawan","insert",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
  <a class="btn btn-success" href="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_view"> <i class="icon icon-arrow-left"></i> Back</a>
					<br />
					<br />
  <h3>Input Karyawan</h3>
    <div class="row-fluid">
		
			<div class="span7">
					<form action="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_act_insert" method="post" id="form_insert" name="form_insert" enctype="multipart/form-data">
						
						<table class="table table-condensed table-striped well">
				
                    <tr class="info">
					  <td colspan="2"><h4><center>Form PJP Baru</h4></td>
					  </tr>
                         
                          <tr>
                            <td><label>Nama : </label></td>
                            <td>
								<input class ="span12" type="text" name="nm_lengkap" id="nm_lengkap" placeholder="Nama Lengkap" maxlength="100" required/>							</td>
                          </tr>
                          <tr>
                            <td><label>Foto Profil : </label></td>
                            <td>
							<input type="hidden" name="foto" value="noimage.jpg" />
						
							<img src="app/karyawan/karyawan_foto/noimage.jpg" width="55" height="55" class="img-rounded">
								<input type="file" name="foto" id="foto" value="noimage.jpg" maxlength="100"/>
								</td>
                          </tr>
						  <tr>
                            <td><label>NIK : </label></td>
                            <td>
								<input class ="span12" type="text" name="nik" id="nik" placeholder="NIK" maxlength="100" />							</td>
                          </tr>
                          <tr>
                            <td><label>No KTP Karyawan : </label></td>
                            <td>
								<input class ="span12" type="text" name="no_ktp" id="no_ktp" placeholder="NO KTP Karyawan" maxlength="100" />							</td>
                          </tr>
                          <tr>
                            <td><label>No NPWP : </label></td>
                            <td>
								<input class ="span12" type="text" name="no_npwp" id="no_npwp" placeholder="NO NPWP Karyawan" maxlength="100" />							</td>
                          </tr>
                          <tr>
                            <td><label>No JAMSOSTEK : </label></td>
                            <td>
								<input  class ="span12" type="text" name="no_jamsostek" id="no_jamsostek" placeholder="NO JAMSOSTEK Karyawan" maxlength="100" />							</td>
                          </tr>
                          <tr>
                            <td> <label>BANK DPLK : </label> </td>
                            <td>
								<input class ="span12" type="text" name="bank_dplk" id="bank_dplk" placeholder="BANK DPLK Karyawan" maxlength="100" />							</td>
                          </tr>
                          <tr>
                            <td><label>NO REK BANK DPLK : </label></td>
                            <td>
								<input class ="span12" type="text" name="no_rek_dplk" id="no_rek_dplk" placeholder="NO REK DPLK Karyawan" maxlength="100" />							</td>
                          </tr>
						  <tr>
                            <td> <label>BANK PAYROLL : </label> </td>
                            <td>
								<input class ="span12" type="text" name="bank_payroll" id="bank_payroll" placeholder="BANK PAYROLL Karyawan" maxlength="100" />							</td>
                          </tr>
                          <tr>
                            <td><label>NO REK PAYROLL: </label></td>
                            <td>
								<input class ="span12" type="text" name="no_rek_payroll" id="no_rek_payroll" placeholder="NO REK PAYROLL" maxlength="100" />							</td>
                          </tr>
                          <tr>
                            <td><label>Tempat Lahir dan Tanggal Lahir: </label></td>
                            <td>
								<input type="text" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat Lahir" maxlength="100" required/>
								
								<input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" maxlength="100" required/>
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
									</script>							
									</td>
                          </tr>
                          <tr>
                            <td><label>Alamat: </label></td>
                            <td>
								<input class ="span12" type="text" name="alamat" id="alamat" placeholder="Alamat" maxlength="300" required/>							</td>
                          </tr>
                          <tr>
                            <td><label>Relasi Kerja: </label></td>
                            <td>
							
								
								<div class="controls">		
								<select name="id_field" onChange='javascript:dinamis(this)'> <option value=''>- Asset / Field -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM field");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_field]>$data[nm_field]</option>";
										}
									?>
								</select>
								</div>
								
								<div class="controls">		
								<select name="id_no_po" onChange='javascript:dinamis2(this)'> <option value=''>- No. PO -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM no_po
										 JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
										 JOIN fpemegang_kontrak ON no_po.id_fpemegang_kontrak = fpemegang_kontrak.id
										ORDER by no_po.id_perusahaan");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_no_po]>$data[no_po] / $data[nm_perusahaan]</option>";
										}
									?>
								</select>
								<input type="hidden" name ="id_fpemegang_kontrak" id ='tampil_pemegang_kontrak'>
								</div>
		
								<div class="controls">		
								<select name="id_fkerja" onChange='javascript:dinamis(this)'> <option value=''>- Nama Fungsi Kerja -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM fungsi_kerja");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_fkerja]>$data[fkerja]</option>";
										}
									?>
								</select>
								</div>			
								
								
								<div class="controls">		
								<select name="id_lks_kerja" onChange='javascript:dinamis(this)'> <option value=''>- Nama Lokasi Kerja -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM lokasi_kerja");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_lokasi]>$data[lokasi]</option>";
										}
									?>
								</select>
								</div>			
								
								
								<div class="controls">		
								<select name="id_sistem_kerja" onChange='javascript:dinamis(this)'> <option value=''>- SISTEM KERJA -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM sistem_kerja");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id]>$data[waktu]</option>";
										}
									?>
								</select>
								</div>
								<div class="control">
								<select name="id_klasifikasi" onChange='javascript:dinamis(this)' required> <option value=''>- KLASIFIKASI -</option>
									<?php 
										$sql = mysql_query("SELECT * FROM klasifikasi");
										while ($data=mysql_fetch_array($sql))
										{
											echo "<option value=$data[id_klasifikasi]>$data[klasifikasi]</option>";
										}
									?>
								</select>
							</div>


							</td>
                          </tr>
						  
						  <tr>
                            <td><label>Nama Pekerjaan : </label></td>
                            <td>
								<input class ="span12" type="text" name="nm_pekerjaan" id="nm_pekerjaan" placeholder="Nama Pekerjaan" maxlength="300" required/>
								</td>
                          </tr>
                         
						 <tr>
                            <td><label>TMT MASA KERJA : </label></td>
                            <td>
								<input type="text" name="tmt" id="tmt" value="2014-01-01" required maxlength="100"/>
					<script src="asset/js/jquery.min.js"></script>
									<script src="asset/js/bootstrap-datepicker.js"></script>
									<script type="text/javascript">
										// When the document is ready
										$(document).ready(function () {
											$('#tmt').datepicker({
												format: "yyyy-mm-dd"
											});  
								
										});
									</script>
								</td>
                          </tr>	  
						  <tr>
                            <td>Perjanjian Kerja</td>
                            <td><input type="file" name="perjanjian_krj"/>
							</td>
                          </tr>
                    		<input type="hidden" name="status" id="status" value="aktif"/>
                        </table>
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
	</div>/span-->
	</div>

            
<?php
}  
else{
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
	}	?>
<?php }
else{
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}?>
