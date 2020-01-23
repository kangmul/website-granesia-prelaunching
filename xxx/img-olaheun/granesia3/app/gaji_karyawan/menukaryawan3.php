
<?php
//$nik = isset($_GET['nik']) ? $_GET['nik'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
?>
<div class="row-fluid">
			<div class="span12">
<ul class="nav nav-pills">
	<li <?php echo $file=='gaji_karyawan_form_insert'?'class="active"':'';?>><a href="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_form_insert&id=<?php echo $_GET['id']; ?>">Gaji Pokok </a></li>
	<li <?php echo $file=='gaji_karyawan_tunjangan_form_insert'?'class="active"':'';?>><a href="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_tunjangan_form_insert&id=<?php echo $_GET['id']; ?>">Tujangan</a></li>
	<li <?php echo $file=='gaji_karyawan_lembur_form_insert'?'class="active"':'';?>><a href="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_lembur_form_insert&id=<?php echo $_GET['id']; ?>">Lembur</a></li>
</ul>
</div>
</div>
