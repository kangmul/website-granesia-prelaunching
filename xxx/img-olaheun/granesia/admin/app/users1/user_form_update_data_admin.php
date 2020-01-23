<?php empty( $f ) ? header('location:../index.php') : '' ;

// koneksi database -------------------------------------------->
include('db.php');
//<--------------------------------------------------------------
$uid = isset($_GET['uid']) ? $_GET['uid'] : null;

$query="SELECT * FROM user LEFT JOIN user_group ON user_group.gid = user.gid where user_group.gid = '1' AND user.su = '1'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

if(isset($_SESSION['gid'])){?>
<?php 
	//role_id diambil dari database -> 1=superadmin, 2 = adm_jtb
	if(isset($_SESSION['gid'])=='1'){ ?>

			<?php include "app/admin.php";?>
<div class="col-sm-10">
			
		<h3 class="page-header"><label>Update User</label></h3>
		


<body>

<div class="panel panel-info">
		 <div class="panel-body">
		 
		 <a class="btn btn-success" href="index.php?t=menuuser&p=users&f=view_user"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a></br>
	
    <form action="index.php?t=menuuser&p=users&f=user_act_update_data_admin" method="post" id="form_update" name="form_update">
	<input type="hidden" name="uid" value="<?php echo $data['uid']; ?>" />
    
	
    <table width="800" border="0" align="left" cellpadding="0" cellspacing="0">
							
							
							<label for="first_name">First Name : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="text" class="form-control" name="first_name" id="first_name" style=" width:200px;" value="<?php echo $data['first_name'];?>" />
								</div>
							</div>
							
							<label for="last_name">Last Name : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="text" class="form-control" name="last_name" id="last_name" style=" width:200px;" value="<?php echo $data['last_name'];?>"/>
								</div>
							</div>
							
							<label for="email">Username : </label>
							<div class="row">
								<div class="col-xs-4">
									<input type="text" class="form-control" name="email" id="email" style=" width:200px;" value="<?php echo $data['email'];?>"/>
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-xs-4">
									<label>User Group </label>
						<select name="gid" class="form-control" style=" width:250px;" onChange='javascript:dinamis(this)' required><?php 
										
										$gid = $data['gid'];
								
								if($gid =='0' || $gid ==''){
										echo "<option value='0' selected>-Group User- </option>";
										$sql = mysql_query("SELECT * FROM user_group");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[gid]>$data2[group_name]</option>";
										}
									}
									
								else {
										$sql = mysql_query("SELECT * FROM user_group WHERE gid='$gid'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[gid]>$data2[group_name]</option>";
										}
									
										$sql = mysql_query("SELECT * FROM user_group WHERE gid != '$gid'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[gid]>$data2[group_name]</option>";
										}
									}
									?>
									</select>
								</div>
							</div>
									
							
                          
					
					</div></td></tr>
		
		</br>
   <button type="submit" class="btn btn-primary">
							<i class="glyphicon glyphicon-saved"></i> Simpan
						</button></td>
    </tr>
    </table>
	
    </form>					
	</div>
	</div>
	</div>

</body>
<?php } ?>
<?php
	
	} else {
		echo '<div class="alert alert-error"> Maaf Anda anda tidak punya akses </div>';
	}
?>