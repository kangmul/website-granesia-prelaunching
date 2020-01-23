<?php 
include ('../db.php');
empty( $f) ? header('location:../index.php') : '' ;?>
</br>
</br>
</br>
</br>


			<div class="col-md-4">
			</div>
<div class="col-md-4 text-center" style="float:bottom">
				<div class="panel panel-primary" style="height:300px;">
					<div class="panel-heading"><strong>Form Login Admin</strong></div>
				<div class="panel-body">
					

<label class="info">Silahkan Masukan Username dan Password Anda !</label>
</br>
<form method="POST" action="cek_login.php" class="navbar-form navbar-center" accept-charset="UTF-8">
						  <ul class="nav nav-pills nav-stacked">
						  </br>
						  <tr>
						  
									<td>Username:</td> 
									<td><input type="text" class="form-control" name="username" required></td>
								
							</tr>
							</br>
							</br>
							 <tr> 
									<td>Password:</td>
									<td><input type="password"  class="form-control" name="password" required></td>
							</tr>	
							</br>	
							</br>	
								  
									<button type="submit" class="btn btn-primary">
									<i class="glyphicon glyphicon-ok-sign"> Login</i>
									</button>
								
								 
								</ul>
						</div>
					
						
					</form>
</div>
</br>
</br>
</br>
</br>

</div>