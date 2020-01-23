<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery.bigPicture.js"></script> 
<script type="text/javascript" src="./js/jquer.bigPicture-min.js"></script> 
<script type="text/javascript" src="./js/jquery.bigPicture-pack.js"></script> 
<script type="text/javascript" src="./js/jquery.easing.js"></script>  
<link rel="stylesheet" type="text/css" href="css/core.css"/>
<link rel="stylesheet" type="text/css" href="css/skin.css"/> 


<!--untuk slideshow-->
<link href="css/amazon_scroller.css" rel="stylesheet" type="text/css"></link>
<script type="text/javascript" src="js/amazon_scroller.js"></script>
<script language="javascript" type="text/javascript">

$(function() {
		$("#amazon_scroller1").amazon_scroller({
			scroller_title_show: 'enable',
			scroller_time_interval: '4000',
			scroller_window_background_color: "#f5f5f5",
			scroller_window_padding: '3',
			scroller_border_size: '1',
			scroller_border_color: 'f5f5f5',
			scroller_images_width: '150',
			scroller_images_height: '100',
			scroller_title_size: '12',
			scroller_title_color: 'black',
			scroller_show_count: '5',
			directory: 'images'
		});
		
	});
</script>

<div class="row-fluid">
<div class="span9">
<div id="amazon_scroller1" class="amazon_scroller" >
		<div class="amazon_scroller_mask">
		
			<ul>
			
			<?php
			
			$select=mysql_query("select * from picture");
			while($row=mysql_fetch_array($select)){
				?><li><a href="app/picture/images/<?php echo $row['gambar'];?>" 
				title="<?php echo $row['keterangan'];?>" class="info" name="gambar">
				<img src="app/picture/images/<?php echo $row['gambar'];?>" width="60" height="60" title="Klik photo"/></a></li><?php			
			}
			?>
		
			</ul>
			
		</div>
		<ul class="amazon_scroller_nav">
			<li></li>
			<li></li>
		</ul>
		<div style="clear: both"></div>
	</div>

<script language="javascript"> 
$('a.info').bigPicture({
  'enableInfo': true,
  'infoPosition': 'bottom'
}); 
</script>
</div>
</div>

