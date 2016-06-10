<?php
	require_once("header-principal.php");
	//session_start()
	/*if (isset($_SESSION['usuario'])) {
		require_once("funciones.php");
		$username=$_SESSION['usuario'];
	}
	else
	{
 		die;
	}*/
?>

<body>
	<!-- header-section-starts -->
	<div class="full">
		<div class="menu">
				<ul>
					<li><a class="active" href="index.php"><i class="home"></i></a></li>
					<li><a href="videos.php"><div class="video"><i class="videos"></i><i class="videos1"></i></div></a></li>
					<li><a href="reviews.php"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
					<li><a href="404.php"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li>
					<li><a href="contact.php"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
				</ul>
		</div>
		<div class="main">
		<div class="header">
			<?php
				require_once("top-header.php");
			?>
		</div>

		<div class="review-slider">
			 <ul id="flexiselDemo1">
			<li><img src="images/review/r1.jpg" alt=""/></li>
			<li><img src="images/review/r2.jpg" alt=""/></li>
			<li><img src="images/review/r3.jpg" alt=""/></li>
			<li><img src="images/review/r4.jpg" alt=""/></li>
			<li><img src="images/review/r5.jpg" alt=""/></li>
			<li><img src="images/review/r6.jpg" alt=""/></li>
		</ul>
			<script type="text/javascript">
		$(window).load(function() {
			
		  $("#flexiselDemo1").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 2
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 3
					},
					tablet: { 
						changePoint:768,
						visibleItems: 4
					}
				}
			});
			});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
		</div>
		<div class="news">
			<div class="right-content-heading">
				<div class="right-content-heading-left">
					<h3 class="head">Noticias</h3>
				</div>
			</div>
			<section id="services">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
		                    <div class="single-service">
		                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
		                            <img src="images/noticia/angry.png" alt="">
		                        </div>
		                        <h2>Noticia</h2>
		                        <p>Pork belly leberkas cow short ribs capicola pork loin. Doner fatback frankfurter jerky meatball pastrami bacon tail sausage. Turkey fatback ball tip, tri-tip tenderloin drumstick salami strip steak.</p>
		                    </div>
		                </div>
		                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
		                    <div class="single-service">
		                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
		                            <img src="images/noticia/alicia.jpg" alt="">
		                        </div>
		                        <h2>Noticia</h2>
		                        <p>Hamburger ribeye drumstick turkey, strip steak sausage ground round shank pastrami beef brisket pancetta venison.</p>
		                    </div>
		                </div>
		                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
		                    <div class="single-service">
		                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
		                            <img src="images/noticia/avengers.jpg" alt="">
		                        </div>
		                        <h2>Noticia</h2>
		                        <p>Venison tongue, salami corned beef ball tip meatloaf bacon. Fatback pork belly bresaola tenderloin bone pork kevin shankle.</p>
		                    </div>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
		                    <div class="single-service">
		                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
		                            <img src="images/noticia/capitan.png" alt="">
		                        </div>
		                        <h2>Noticia</h2>
		                        <p>Pork belly leberkas cow short ribs capicola pork loin. Doner fatback frankfurter jerky meatball pastrami bacon tail sausage. Turkey fatback ball tip, tri-tip tenderloin drumstick salami strip steak.</p>
		                    </div>
		                </div>
		                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
		                    <div class="single-service">
		                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
		                            <img src="images/noticia/justin.jpg" alt="">
		                        </div>
		                        <h2>Noticia</h2>
		                        <p>Hamburger ribeye drumstick turkey, strip steak sausage ground round shank pastrami beef brisket pancetta venison.</p>
		                    </div>
		                </div>
		                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
		                    <div class="single-service">
		                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
		                            <img src="images/noticia/spider.jpg" alt="">
		                        </div>
		                        <h2>Noticia</h2>
		                        <p>Venison tongue, salami corned beef ball tip meatloaf bacon. Fatback pork belly bresaola tenderloin bone pork kevin shankle.</p>
		                    </div>
		                </div>
		            </div>
		        </div>
    		</section>
			<div class="clearfix"></div>
		</div>	
	<?php
		require_once("footer.php");
	?>