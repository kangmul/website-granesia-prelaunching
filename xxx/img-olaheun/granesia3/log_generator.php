<?php
//definisikan nama file log, berubah tiap bulannya
$_logfilename = "log_pertamina_".date("Y-m").".txt"; //nama log: log_2011-02
 
// jika file log belum ada, buat dulu
if(!file_exists('log/'.$_logfilename)){
    $_logfilehandler = fopen("log\\".$_logfilename,'w'); #buat file dengan akses tulis penuh
    fwrite($_logfilehandler, "/* log tkjp pertamina */\n"); #tulis header untuk file log, jika perlu
	
	$create_date = date('Y-m-d');
	$query_log = "INSERT INTO log(id_log,nama_file,create_date ) VALUES('','$_logfilename','$create_date')";
	mysql_query($query_log);
    //fclose($_logfilehandler);
	
}else{
    $_logfilehandler = fopen("log\\".$_logfilename,'a'); #akses file dengan modus buka/tulis
}
 
// misalnya untuk aksi A

//$time = @date('[Y-d-m:H:i:s]');
//fwrite($_logfilehandler,$time." --> User X melakukan aksi A \n");
//fclose($_logfilehandler);
?>


