<?php empty( $f ) ? header('location:../index.php') : '' ;

// koneksi database -------------------------------------------->
include('db.php');
//<--------------------------------------------------------------


if(isset($_SESSION['gid'])){?>
<?php 
	//role_id diambil dari database -> 1=superadmin, 2 = adm_jtb
	if(isset($_SESSION['gid'])=='1'){ ?>

			<?php include "app/admin.php";?>
<div class="col-sm-10">
			<?php include "app/users/menuuser.php";?>
			<h3 class="page-header"><label>User</label></h3>
			
						<?php

						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}

						?>
						
							
					
			
					<!-- TAMPILKAN DATA SUPERADMIN -->
			<div class="panel panel-info">
			<div class="panel-heading">Administrator</div>
			 <div class="panel-body">
					<script>
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
		
				<table class="table table-condensed table-bordered" id="example">
					<thead>
					<tr class="success">
							<th><center>No</center></th>
							<th><center>First Name</center></th>
							<th><center>Last Name</center></th>	
							<th><center>Username</center></th>				
							<th><center>Position Operator</center></th>					
							<th><center>Status</center></th>
							<th><center>Action</center></th>
						</tr>
					</thead>
						<?php
							$query="SELECT * 
								FROM user LEFT JOIN user_group ON user_group.gid = user.gid where user_group.gid = '1' AND user.su = '1'";
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>

						<tr>
							<!-- <td><?php echo $no++; ?></td> -->
							<td><center><?php echo $no; ?></td>
							<td><center><?php echo $rows['first_name']; ?></center></td>
							<td><center><?php echo $rows['last_name']; ?></center></td>
							<td><center><?php echo $rows['email']; ?></center></td>
							<td><center><?php echo $rows['group_name']; ?></center></td>
							<td><center><?php echo $rows['status']; ?></center></td>
							<td><center>
							<div class="btn-group">
								<!--<a type="button" href="#myModal" 	data-id="<?php echo $rows['id']; ?>"
																	class="btn btn-info btn-sm detail" data-toggle="modal">
                                <i class="glyphicon glyphicon-search"></i>  Detail
								</a>-->
								
								<a href="index.php?t=menuuser&p=users&f=user_form_update_data_admin&uid=<?php  echo $rows['uid']; ?>" class="btn-sm btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i> Update</a>
								
								<a type="button" href="#myModal" 	data-uid="<?php echo $rows['uid']; ?>"
																	class="btn btn-primary btn-sm password" data-toggle="modal">
                                   <i class="glyphicon glyphicon-pencil"></i>  Edit Password
								</a>
									<script>
										
										
										
										$(document).on( "click", '.password',function(e) {
											//idAlat = 0;
											var uid = $(this).data('uid');
											
											var url = "app/users/user_form_update_password.php";
											$("#myModalLabel").html("Ganti Password");
								
											$.post(url, {uid: uid } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
										
										
									</script>
									
								<a href="index.php?t=menuuser&p=users&f=user_act_delete_hapus&uid=<?php echo $rows['uid']; ?>" 
									onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-sm btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i> Delete</a>	
								</div>					
							</center></td>
						</tr>
						
						<?php
							}
						?>
					</table>
					
					
					</br>
					</div>
					
					<div class="panel-heading">Users </div>
					 <div class="panel-body">
						<!-- TAMPILKAN DATA PENGGUNA -->
						
					<script>
			$(document).ready(function() {
				$('#example2').dataTable();
			} );
		</script>
		
				<table class="table table-condensed table-bordered" id="example2">
					<thead>
					<tr class="success">
							<th><center>No</center></th>
							<th><center>Nopek</center></th>
							<th><center>First Name</center></th>
							<th><center>Last Name</center></th>	
							<th><center>Username</center></th>				
							<th><center>Position Operator</center></th>					
							<th><center>Status</center></th>
							<th><center>Action</center></th>
						</tr>
					</thead>
						<?php
							$query="SELECT * 
									FROM user LEFT JOIN user_group ON user_group.gid = user.gid where user_group.gid != '1' AND user.su = '0'";
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>

						<tr>
							<!-- <td><?php echo $no++; ?></td> -->
							<td><center><?php echo $no; ?></center></td>
							<td><center><?php echo $rows['country']; ?></center></td>
							<td><center><?php echo $rows['first_name']; ?></center></td>
							<td><center><?php echo $rows['last_name']; ?></center></td>
							<td><center><?php echo $rows['email']; ?></center></td>
							<td><center><?php echo $rows['group_name']; ?></center></td>
							<td><center><?php echo $rows['status']; ?></center></td>
							<td><center>
								<div class="btn-group">
									
								<a href="index.php?t=menuuser&p=users&f=user_form_update_data&uid=<?php  echo $rows['uid']; ?>" class="btn-sm btn btn-warning">
								<i class="glyphicon glyphicon-pencil"></i> Update</a>
							
								<a type="button" href="#myModal" 	data-uid="<?php echo $rows['uid']; ?>"
																	class="btn btn-primary btn-sm password" data-toggle="modal">
                                   <i class="glyphicon glyphicon-pencil"></i>  Edit Password
								</a>
									<script>
										
										
										
										$(document).on( "click", '.password',function(e) {
											//idAlat = 0;
											var uid = $(this).data('uid');
											
											var url = "app/users/user_form_update_password.php";
											$("#myModalLabel").html("Ganti Password");
								
											$.post(url, {uid: uid } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
										
										
									</script>
									
									
								
										
									<!--	<?php if($rows['status'] == 'T'){?>
											<a href="index.php?t=menuuser&p=users&f=user_act_update_stat&uid=<?php echo $rows['uid']; ?>&stat=Y" class="btn-sm btn btn-danger">
											<i class="glyphicon glyphicon-ok"></i> Aktifkan</a>
										<?php }else if($rows['status'] == 'Y'){?>
											<a href="index.php?t=menuuser&p=users&f=user_act_update_stat&uid=<?php echo $rows['uid']; ?>&stat=T" class="btn-sm btn btn-danger">
											<i class="glyphicon glyphicon-trash"></i> Nonaktifkan</a>
										<?php }?>-->
										
										
								<a href="index.php?t=menuuser&p=users&f=user_act_delete_hapus&uid=<?php echo $rows['uid']; ?>" 
									onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-sm btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i> Delete</a>
								</div>	
								</center>
							</td>
						</tr>
						
						<?php
							}
						?>
					</table>
				
	</div>
	</div>
	</div>
	

	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>
<?php }?>
<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>