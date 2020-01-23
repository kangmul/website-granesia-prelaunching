<?php
//include ('db.php');
$hal = $_GET['halaman'];

$id_his = isset($_GET['id_his']) ? $_GET['id_his'] : null;

$query = "UPDATE history SET status_baca = 'Y' WHERE id_his='$id_his'";

$result = mysql_query($query) or die(mysql_error());

mysql_close();

echo "<script>; 
			location.href='index.php?tab=datahistory&folder=history&file=history_form_view&halaman=$hal';
			</script>";


?>