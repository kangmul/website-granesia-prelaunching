	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="WOW Slider, Gallery Slider, Website Slider" />
	<meta name="description" content="WOWSlider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images">
	<ul>
	<?php
		$select=mysql_query("select * from tools_gallery");
		while($row=mysql_fetch_array($select)){
	?>	<li><img src="app/slide_show/images/<?php echo $row['gambar'];?>" width="60" height="60" title="<?php echo $row['keterangan'];?>" ></a></li><?php
		}
	?>
	</ul>
	</div>
	<div class="ws_bullets"><div>
	<?php
		$select=mysql_query("select * from tools_gallery");
		while($row=mysql_fetch_array($select)){
			?><a href="#" ><img src="app/slide_show/images/<?php echo $row['gambar'];?>" width="160" height="120" ></a><?php	
		}
	?>
	</div>
	</div>
<span class="wsl"><a href="http://wowslider.com">Gallery Plugin</a> pertamina.com</span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->