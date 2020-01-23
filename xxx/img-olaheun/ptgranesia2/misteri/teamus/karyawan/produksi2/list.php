<!DOCTYPE html>   
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>PT.Granesia</title>
<link rel="icon" href="title.jpg"  type="image/jpg">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>  
<body style="margin:20px auto">  
<div class="container">
<table id="myTable" class="table table-striped" >  
       <thead>  
          <tr>  
            <th>NO</th>   
			<th>FOTO</th>
            <th>NAMA</th> 
			<th>ALAMAT</th>
			<th>AWAL</th>
			<th>STATUS</th>			
          </tr>  
        </thead>  
						<?php
		mysql_connect("localhost","root","");
		mysql_select_db("ptgranesia");
		
		$sql=mysql_query("SELECT * FROM produksi2");
		$no=1;
		while($data=mysql_fetch_array($sql)){
		?>
		<tr>
			<td align="center"><?php echo $no++; ?>.</td>
			<td><?php echo $data['foto'] ?></td>
			<td><?php echo $data['nama'] ?></td>
			<td><?php echo $data['alamat'] ?></td>
			<td><?php echo $data['awal'] ?></td>
			<td><?php echo $data['status'] ?></td>
		</tr>
		<?php
		}
		?>
        <tbody>  

        </tbody>  
      </table>  
	  </div>
</body>   
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  
