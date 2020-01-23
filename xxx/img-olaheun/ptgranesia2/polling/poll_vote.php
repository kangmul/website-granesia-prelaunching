<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}

//insert votes to txt file
$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h1>Hasil:</h1>
<table>
<tr>
<td>Bagus:</td>
<td>
<img src="poll1.gif"
width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($yes/($no+$yes),2)); ?>% <span><i class="fa-thumbs-o-up"></i></span>
</td>
</tr>
<tr>
<td>Tidak:</td>
<td>
<img src="poll2.gif"
width='<?php echo(100*round($no/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($no/($no+$yes),2)); ?>% <span><i class="fa-thumbs-o-down"></i></span>
</td>
</tr></table>
<table>
<tr>
<td><h1>Terima Kasih Atas VOTE Anda.</h1></td>
</tr>
</table> 
