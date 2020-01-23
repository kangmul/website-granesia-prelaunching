<?php
include ('../../db.php');
// $username = $_GET['username'];
$index = isset($_GET['index']) ? $_GET['index'] : null;
//$idp = isset($_GET['idp']) ? $_GET['idp'] : null;

$query = "SELECT * FROM pendidikan
				INNER JOIN tkjp ON tkjp.index = pendidikan.id_karyawan 
				WHERE pendidikan.id_karyawan = '".$index."'";

$result = mysql_query($query);
$data = mysql_fetch_array($result) or die(mysql_error());

echo "Nama Karyawan : ".$data['nm_lengkap'];
	
?>
	</br>
	</br>
	<form action="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_act_update_pendidikan" method="post" id="form_update" name="form_update" enctype="multipart/form-data">
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td>
	<input type="hidden" name="index" value="<?php echo $data['idp']; ?>" /></td>
	</tr>
	<tr>
	<td>Tahun</td><td>:</td><td><input class="input" name="t_pdk" type="text" value="<?php echo $data['t_pdk']; ?>"><span> format: 2000-2006</span></td>
	</tr>
	<tr>
	<td>Detail Pendidikan</td><td>:</td><td><textarea class="input" name="d_pdk" rows="5"><?php echo $data['d_pdk']; ?></textarea></td>
	</tr>
	</table>
	<tr>
	<button type="submit" class="btn btn-primary">
								<i class="icon icon-plus"></i> Update
							</button>
							<button type="reset" class="btn btn-warning">
								<i class="icon icon-refresh"></i> Batal
							</button>
	</tr>
	</form>