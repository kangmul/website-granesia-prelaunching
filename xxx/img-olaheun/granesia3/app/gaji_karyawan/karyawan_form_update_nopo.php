<?php
include ('../../db.php');
// $username = $_GET['username'];


$index = isset($_POST['index']) ? $_POST['index'] : null;

$query = "SELECT * FROM tkjp LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po WHERE tkjp.index = '$index'";


$result = mysql_query($query);
$data = mysql_fetch_array($result) or die(mysql_error());

echo "Nama PJP : ".$data['nm_lengkap'];
echo "</br>";
echo "NO PO Asal : ".$data['no_po'];
echo "</br>";

?>

<form action="index.php?tab=datatabel&folder=karyawan&file=karyawan_act_update_nopo_history" method="post" id="form_update" name="form_update">
	<input type="hidden" name="index" value="<?php echo $data['index']; ?>" />
		<div class="control-group">
		</br>
			<label for="id_no_po"><b>Pilih NO PO Baru : </b></label>
				<div class="control-group">
				</br>
					<select name="id_no_po" class="form-control"
				style=" width:200px;" onchange="this.form.submit()" required>
                        <?php 
									$id_pmegang_kontrak = '';
										$id_no_po = $data['id_no_po'];
										echo "<option value='0' selected>-PILIH No.PO BARU- </option>";
										$sql = mysql_query("SELECT * FROM no_po
										JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
										JOIN fpemegang_kontrak ON no_po.id_fpemegang_kontrak = fpemegang_kontrak.id
										WHERE id_no_po !='$id_no_po' and status_nopo = 'aktif' ORDER by no_po.id_perusahaan");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_no_po]>$data2[no_po] / $data2[nm_perusahaan]</option>";
										}
									
									?>
                    </select>
							 
				</div>
					<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>
					
					</form>
				