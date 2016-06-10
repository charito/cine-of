<?php
	require_once("header-principal.php");
?>

<body>
	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a href="index.php"><div class="hm"><i class="home1"></i><i class="home2"></i></div></a></li>
					<li><a class="active" href="videos.php"><div class="video"><i class="videos"></i><i class="videos1"></i></div></a></li>
					<li><a href="reviews.php"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
					<li><a href="404.php"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li>
					<li><a href="contact.php"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
				</ul>
			</div>
		<div class="main">
		<div class="video-content">
			<?php
				require_once("top-header.php");
			?>
			<div class="right-content">
				<div class="right-content-heading">
					<div class="right-content-heading-left">
						<h3 class="head">Latest Colletcion of videos</h3>
					</div>
				</div>
				<!-- pop-up-box --> 
		<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		 <script>
				$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});
				});
		</script>		

		<!--//pop-up-box -->

				<div class="content-grids">
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/categoria/categ1.jpg" title="allbum-name" /></a>
						<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div>
					<div id="small-dialog" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/2LqzF5WauAw" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/categoria/categ2.jpg" title="allbum-name" /></a>
						<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/categoria/categ3.jpg" title="allbum-name" /></a>
						<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div>
					<div class="content-grid last-grid">
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/categoria/categ4.jpg" title="allbum-name" /></a>
						<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/categoria/categ1.jpg" title="allbum-name" /></a>
						<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/categoria/categ2.jpg" title="allbum-name" /></a>
						<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/categoria/categ3.jpg" title="allbum-name" /></a>
						<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div>
					<div class="content-grid last-grid">
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/categoria/categ4.jpg" title="allbum-name" /></a>
						<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div>
					<div class="clearfix"> </div>
					
					<div class="pagenation">
						<ul>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
					
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>	
<?php
	require_once("footer.php");
?>