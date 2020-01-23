<?php
include ('../../db.php');

$uid = isset($_POST['uid']) ? $_POST['uid'] : null;

$query = "SELECT * FROM user  WHERE uid='$uid'";
$result = mysql_query($query);
$data = mysql_fetch_array($result) or die(mysql_error());

?>

					<form action="index.php?t=menuuser&p=users&f=user_act_update_password" method="post" id="form_update" name="form_update">
						<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
					
						<div class="control-group">
							<label for="level"><b>Masukan Password Baru Anda, Kemudian Tekan Enter! </b></label>
								<div class="controls">
									<input type="password" class="form-control"
									style=" width:200px;" onchange="this.form.submit()" name="password_baru" value=""/>
								
								</div>
						</div>
						<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>
						
					</form>
				</div>
		


