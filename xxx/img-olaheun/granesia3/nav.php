<style type="text/css">
<!--
.style2 {
	font-weight: bold;
	color: #FFFFFF;
}
.style3 {color: #FFFFFF}
-->
</style>
<div class="navbar navbar-fixed-top">
	<div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar style2" data-toggle="collapse" data-target=".nav-collapse"></button>
		  
          <span class="style3" style="font-weight: bold">
		  <a class="brand" href="index.php" style="color:#FFFFFF; font-weight: bold;">SISTEM KEPEGAWAIAN PT. GRANESIA</a></span>
          <div class="nav-collapse collapse">
            <ul class="nav navbar-nav pull-right">
			<li class="pull-right">			</li>
               <li class="pull-right">
					<?php 
						if(isset($_SESSION['index']) && isset($_SESSION['role_id']) ){
							$no_user = $_SESSION{'index'};
							$role_id = $_SESSION{'role_id'};
						} else{
							$no_user = '';
							$role_id = '';
						}
						
					if(check_user("index","notifikasi_history",$no_user,$role_id) == TRUE){?>
					<!--<div id="pesan" class="btn btn-info dropdown-toggle">
						Notifikasi
						<span id="notifikasi"></span>
					</div>-->
					<?php }?>
					<?php if (isset($_SESSION['nama'])):?>
					
					<div class="btn-group">
						<a class="btn btn-info dropdown-toggle" href="#"><i class="icon-user"></i>&nbsp;<?php echo $_SESSION['nama'];?>&nbsp;(<?php echo $_SESSION['jabatan'];?>)</a>
						<a class="btn btn-info dropdown-toggle" data-target="#" data-toggle="dropdown" href="#"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?folder=users&file=admin_profil"><i class="icon-user"></i> View Profile</a></li>
								<li><a href="index.php?folder=users&file=admin_form_update"><i class="icon-pencil"></i> Edit Profile</a></li>
								<li class="divider"></li>
								<li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
							</ul>
					</div>
					<div id="info">
						<div id="loading"><br>Loading...<img src="loading.gif"></div>
						<div id="konten-info">						</div>
					</div>
					<?php endif;?>							
			  </li>
		   </ul>
		  </div><!--/.nav-collapse -->
        </div>
      </div>
	  
	</div>
	<a href="#top" class="pull-right"><img src="img/back-to-top.png"></a>
</div>
