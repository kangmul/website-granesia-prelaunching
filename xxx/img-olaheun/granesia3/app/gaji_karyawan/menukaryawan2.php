<?php
//$nik = isset($_GET['nik']) ? $_GET['nik'] : null;
$index = isset($_GET['index']) ? $_GET['index'] : null;
?>

<a href="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_view" class="btn  btn-success">
<i class="icon icon-arrow-left"></i> Kembali</a>
<?php if(check_user("karyawan","print_pdf",$_SESSION['index'],$_SESSION['role_id']) == TRUE){ ?>
<a href="pdfDetail.php?index=<?php echo $_GET['index'];?>" target="_blank"  class="btn btn-primary">
<i class="icon-print"></i> pdf </a>
<?php }?>
</br></br>
<div class="row-fluid">
			<div class="span12">
<ul class="nav nav-pills">
	<li <?php echo $file=='profil'?'class="active"':'';?>><a href="index.php?tab=datakaryawan&folder=karyawan&file=profil&index=<?php echo $_GET['index']; ?>">Profil </a></li>
	<li <?php echo $file=='relasikerja'?'class="active"':'';?>><a href="index.php?tab=datakaryawan&folder=karyawan&file=relasikerja&index=<?php echo $_GET['index']; ?>">History Pekerjaan</a></li>
	<li <?php echo $file=='berkas'?'class="active"':'';?>><a href="index.php?tab=datakaryawan&folder=karyawan&file=berkas&index=<?php echo $_GET['index']; ?>">Berkas</a></li>

	<?php if(check_user("karyawan","update",$_SESSION['index'],$_SESSION['role_id']) == TRUE){ ?>
	<li <?php echo $file=='karyawan_form_update'?'class="active"':'';?>><a href="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=<?php echo $_GET['index']; ?>">Update</a></li>
	
	<li class="pull-right">
		<a href="index.php?tab=datakaryawan&folder=karyawan
								&file=karyawan_act_delete&index=<?php echo $index;?>" 
				onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"  
			class="alert alert-danger"><i class="icon icon-trash"></i></a>
	</li>
	<?php }?>	
		
	<li class="dropdown pull-right">
						<a class="alert alert-success">
						<?php
							$query="SELECT * FROM 
											 tkjp
											 where tkjp.index ='".$index."'";
							$result=mysql_query($query) or die(mysql_error());
							while($rows=mysql_fetch_array($result)){
							?>
						Dibuat oleh :<em><strong> (<?php echo $rows['created_by'];?>)</strong></em>    Pada Tanggal : <em><strong><?php echo $rows['tanggal_dibuat'];?></strong></em> </a>
						<?php } ?>
	</li>
</ul>
</div>
</div>
