<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script>
$(document).ready(function(){

$('[rel=tooltip]').bind('mouseover', function(){
	  
		
	
 if ($(this).hasClass('ajax')) {
	var ajax = $(this).attr('ajax');	
			
  $.get(ajax,
  function(theMessage){
$('<div class="tooltip">'  + theMessage + '</div>').appendTo('body').fadeIn('fast');});

 
 }else{
			
	    var theMessage = $(this).attr('content');
	    $('<div class="tooltip">' + theMessage + '</div>').appendTo('body').fadeIn('fast');
		}
		
		$(this).bind('mousemove', function(e){
			$('div.tooltip').css({
				'top': e.pageY - ($('div.tooltip').height() / 2) - 5,
				'left': e.pageX + 15
			});
		});
	}).bind('mouseout', function(){
		$('div.tooltip').fadeOut('fast', function(){
			$(this).remove();
		});
	});
						   });

</script>

<style>
.tooltip{
	position:absolute;
	width:320px;
	background-image:url(tip-bg.png);
	background-position:left center;
	background-repeat:no-repeat;
	color:#FFF;
	padding:5px 5px 5px 18px;
	font-size:12px;
	font-family:Verdana, Geneva, sans-serif;
	}
	
.tooltip-image{
	float:left;
	margin-right:5px;
	margin-bottom:5px;
	margin-top:3px;}	
	
	
	.tooltip span{font-weight:700;
color:#ffea00;}




li{
	margin-bottom:30px;}
	#imagcon{
		overflow:hidden;
		float:left;
		height:100px;
		width:100px;
		margin-right:5px;
	}
	#imagcon img{
		max-width:100px;
	}
	#wrapper{
		margin:0 auto;
		width:500px;
		margin-top: 99px;
	}
</style>		
		
		
		<?php
		
		$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test", $con);

		
		
								$result = mysql_query("SELECT * FROM display");

while($row = mysql_fetch_array($result))
  {
echo '<a href=# alt=Image Tooltip rel=tooltip content="<div id=imagcon><img src='.$row['images'].' class=tooltip-image/></div><div id=con>Address:'.$row['Address'].'</div><div id=con>Contact:'.$row['contact'].'</div><div id=con>Email:'.$row['email'].'</div><div id=con>Status:'.$row['status'].'</div><div id=con>Age:'.$row['age'].'</div>">'.$row['Name'].'</a>'.'<br>';
  }

							?>