<?php
include ('config.php');
// $username = $_GET['username'];
//<--------------------------------------------------------------
$index = isset($_GET['index']) ? $_GET['index'] : null;

?>
<form action="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_act_insert_penugasan&index=<?php echo $_GET['index']; ?>" method="post" id="form_insert" name="form_insert">
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input type="hidden" class="input" name="index" value="<?php echo $_GET['index']; ?>" /></td>
	</tr>
	<tr>
	<td>Tahun</td><td>:</td><td><input class="input" name="t_penugasan" type="text"><span> format: 2000-2006</span></td>
	</tr>
	<tr>
	<td>Detail Status</td><td>:</td><td><input class="input" name="d_penugasan" type="text" onchange="this.form.submit()"></td>
	</tr>
	
	</table>
	
	</form>
	


	