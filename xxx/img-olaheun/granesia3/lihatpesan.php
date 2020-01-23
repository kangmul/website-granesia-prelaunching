<?php
session_start();
include "config.php";
$pesan = mysql_query("SELECT * FROM history WHERE  status_baca='N'  ORDER BY create_date DESC LIMIT 10");
$j = mysql_num_rows($pesan);
if($j>0){
   
}else{
    die("<font color=red size=1>Tidak ada pesan baru yang belum dibaca</font>");
}
while($p = mysql_fetch_array($pesan)){
    echo "<p onmouseover=\"this.style.backgroundColor='skyblue'\" onmouseout=\"this.style.backgroundColor='#efefef'\">
     <a href=index.php?tab=datahistory&folder=history&file=history_detail_view&id_his=".$p['id_his'].">".$p['ket']." oleh ".$p['user']."</a> </br>
     Waktu : ".$p['create_date']."</p>";
}
echo "<p onmouseover=\"this.style.backgroundColor='skyblue'\" onmouseout=\"this.style.backgroundColor='#efefef'\">
     <a href=index.php?tab=datahistory&folder=history&file=history_form_view_belum>Lihat Semua History</a></p>";

?>
