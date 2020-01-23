<?php
//$nik = isset($_GET['nik']) ? $_GET['nik'] : null;
$index = isset($_GET['index']) ? $_GET['index'] : null;
?>

<ul class="nav nav-pills">
	<li <?php echo $file=='user_form_view'?'class="active"':'';?>><a href="index.php?tab=datausers&folder=users&file=user_form_view">View User </a></li>
	<li <?php echo $file=='user_form_insert'?'class="active"':'';?>><a href="index.php?tab=datausers&folder=users&file=user_form_insert">Tambah User </a></li>
	<li <?php echo $file=='roles_form_view'?'class="active"':'';?>><a href="index.php?tab=datausers&folder=users&file=roles_form_view">Otoritas User</a></li>
	</li>
</ul>
