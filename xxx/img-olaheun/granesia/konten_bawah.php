<link rel="stylesheet" type="text/css" href="plugins/Amazon/css/core.css"/>
<link rel="stylesheet" type="text/css" href="plugins/Amazon/css/skin.css"/> 
<link href="plugins/Amazon/css/amazon_scroller.css" rel="stylesheet" type="text/css"></link>

<script type="text/javascript" src="plugins/Amazon/js/jquery.js"></script>
<script type="text/javascript" src="plugins/Amazon/js/jquery.bigPicture.js"></script> 
<script type="text/javascript" src="plugins/Amazon/js/jquer.bigPicture-min.js"></script> 
<script type="text/javascript" src="plugins/Amazon/js/jquery.bigPicture-pack.js"></script> 
<script type="text/javascript" src="plugins/Amazon/js/jquery.easing.js"></script>  
<script type="text/javascript" src="plugins/Amazon/js/amazon_scroller.js"></script>
<script language="javascript" type="text/javascript">

	$(function() {
		$("#amazon_scroller1").amazon_scroller({
			scroller_title_show: 'enable',
			scroller_time_interval: '4000',
			scroller_window_background_color: "none",
			scroller_window_padding: '5',
			scroller_border_size: '1',
			scroller_border_color: 'none',
			scroller_images_width: '140',
			scroller_images_height: '100',
			scroller_title_size: '12',
			scroller_title_color: 'black',
			scroller_show_count: '5',
			directory: 'images'
		});
		$("#amazon_scroller2").amazon_scroller({
			scroller_title_show: 'disable',
			scroller_time_interval: '3000',
			scroller_window_background_color: "none",
			scroller_window_padding: '5',
			scroller_border_size: '0',
			scroller_border_color: 'none',
			scroller_images_width: '100',
			scroller_images_height: '80',
			scroller_title_size: '12',
			scroller_title_color: 'black',
			scroller_show_count: '5',
			directory: 'images'
		});
		$("#amazon_scroller3").amazon_scroller({
			scroller_title_show: 'enable',
			scroller_time_interval: '3000',
			scroller_window_background_color: "none",
			scroller_window_padding: '5',
			scroller_border_size: '2',
			scroller_border_color: 'none',
			scroller_images_width: '100',
			scroller_images_height: '60',
			scroller_title_size: '11',
			scroller_title_color: 'black',
			scroller_show_count: '5',
			directory: 'images'
		});
	});
</script>
<div class="container-fluid">
<div class="row-fluid">
<div class="span9">
<div id="amazon_scroller1" class="amazon_scroller" >
		<div class="amazon_scroller_mask">
		
			<ul>
			
			
			<?php
							$query="SELECT * FROM link_terkait ";
								$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
						<li><a href="<?php  echo $rows['tag_link']; ?>"><img src="./admin/app/link_terkait/files/<?php echo $rows['gambar'];?>" width="120" height="60"/><?php  echo $rows['nama_link']; ?></a></li>
						<?php 
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
</div>
</div>
</div>

<script language="javascript"> 
$('a.info').bigPicture({
  'enableInfo': true,
  'infoPosition': 'bottom'
}); 
</script>



