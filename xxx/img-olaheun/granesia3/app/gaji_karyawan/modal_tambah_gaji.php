<?php
include ('../../db.php');

?>
	  <form action="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_form_insert&index=<?php echo $data['index']; ?>" method="post" >
	  <input type="hidden" name="index" value="<?php echo $data['index']; ?>" />
		
				<div class="control-group">
				</br>
					<select name="index" class="form-control"
				style=" width:200px;" onchange="this.form.submit()" required>
                        <?php 
							//$index = isset($_GET['index']) ? $_GET['index'] : null;
							
									if($index =='0' || $index ==''){
										echo "<option value='0' selected>-Pilih Karyawan- </option>";
							$sql = mysql_query("SELECT * FROM tkjp ORDER by nm_lengkap ASC");
								while ($data=mysql_fetch_array($sql))
									{
										echo "<option value=$data[index]>$data[nm_lengkap]</option>";
									}
									}
						?>
                    </select>
							 
				</div>
					
					</form>
      