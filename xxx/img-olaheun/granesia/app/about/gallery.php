<?php 
	include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $f ) ? header('location:../../index.php') :
	'' ;
if(isset($_GET['t'])){?>
		<!--<link rel="stylesheet" href="plugins/gallery/css/basic.css" type="text/css" />-->
		<link rel="stylesheet" href="plugins/gallery/css/galleriffic-3.css" type="text/css" />
		<script type="text/javascript" src="plugins/gallery/js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="plugins/gallery/js/jquery.history.js"></script>
		<script type="text/javascript" src="plugins/gallery/js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="plugins/gallery/js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>
		<div class="main">
			<div class="container-fluid">
				<div class="row" style="height:8px; background-color:blue;" ></div>
					<div class="row">
						<div class="col-lg-12">
							<div class="col-lg-3">
								<?php include "menudata.php";?>
							</div>
						<div class="col-lg-9">	
							<div class="panel panel-primary col-lg-12">
										<h1>Galleriffic</h1>
										<div id="gallery" class="content" >
											<div id="controls" class="controls"></div>
												<div class="slideshow-container">
													<div id="loading" class="loader"></div>
													<div id="slideshow" class="slideshow"></div>
												</div>
												</br>
													<div id="caption" class="caption-container"></div>
										</div>
								<div id="thumbs" class="navigation">
									<ul class="thumbs noscript">
								<?php
									$select=mysql_query("select * from foto");
									while($rows=mysql_fetch_array($select)){?>
									<li>
										<a class="thumb" href="admin/app/foto/files/<?php echo $rows['gambar']; ?>" title="<?php echo $rows['judul']; ?>">
										<img src="admin/app/foto/files/<?php echo $rows['gambar']; ?>" width="100px" height="100px" alt="<?php echo $rows['judul']; ?>">
										</a>
										<div class="caption">
										<div class="download">
										<a href="admin/app/foto/files/<?php echo $rows['gambar']; ?>">Download Original</a>
										</div>
										<div class="image-title"><?php echo $rows['judul']; ?></div>
										<div class="image-desc"><?php echo $rows['keterangan']; ?></div>
										</div>
									</li>
									<?php			
						}
						?>
								</ul>
								</div>
								
									<div style="clear: both;"></div>
								
				<!-- End Advanced Gallery Html Containers -->
				<br>
						</div>
						</br>
					</div>	
					</br>
				</div>
			</div>				
	</div>				
</div>				

		
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;
					
					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page. 
					// pageload is called at once. 
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				/****************************************************************************************/
			});
		</script>
		
<?php
	} 
?>