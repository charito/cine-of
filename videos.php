<?php
	require_once("header-principal.php");
	session_start();
	require_once("funciones.php");
    $xc=conectar();   
    if (!empty($_SESSION['id_usuario'])) {

    	$id_usuario=$_SESSION['id_usuario'];

    	$sql="SELECT c.id_Categoria, c.nombre_Categoria, c.img_Categoria FROM categoria_perfil cp, categoria c WHERE cp.Categoria_id_Categoria = c.id_Categoria and cp.Perfil_id_Perfil=$id_usuario";              

       	$cate_resultado=mysqli_query($xc,$sql);
       	$categorias = array();
       	$categorias_vals = array();

       	while ($extraido = mysqli_fetch_array($cate_resultado)) {
			$categorias[] = $extraido['nombre_Categoria'];
			$id_categoria = $extraido['id_Categoria'];

			$sql2="SELECT p.nombre_Peli, p.duracion_Peli, p.estreno_Peli,p.imagen_Portada_Peli ,p.logo_Peli FROM peliculas p, categoria_peliculas ctp WHERE p.id_Peli=ctp.id_Peli and ctp.id_Categoria=$id_categoria";
       		$resultadop=mysqli_query($xc,$sql2);
			
			$peliculas = array();
			while ($extraidop = mysqli_fetch_array($resultadop)) {
				$peli = array();
				$peli["nombre_Peli"] = $extraidop['nombre_Peli'];
				$peli["duracion_Peli"] = $extraidop['duracion_Peli'];
				$peli["estreno_Peli"] = $extraidop['estreno_Peli'];

				/// los blobs se tienen que transformar paara guardarlos en el array
				$image = imagecreatefromstring($extraidop['imagen_Portada_Peli']); 
				ob_start(); //start capture of the output buffer
				imagejpeg($image, null, 80);
				$data = ob_get_contents();
				ob_end_clean();
				$peli["imagen_Portada_Peli"] = $data;

				$image = imagecreatefromstring($extraidop['logo_Peli']); 
				ob_start(); //start capture of the output buffer
				imagejpeg($image, null, 80);
				$data = ob_get_contents();
				ob_end_clean();
				$peli["logo_Peli"] = $data;
				$peliculas[] = $peli;
			}
			$categorias_vals[]=$peliculas;

		}
    }
    else{    	
    	$categorias=array();
    }
    desconectar($xc);
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


				<?php
					foreach ($categorias as $key => $value): ?>

					<div class="right-content-heading">
						<div class="right-content-heading-left">
							<h3 class="head"><?php echo $value;?></h3>
						</div>
					</div>

					<?php
						$pelis = $categorias_vals[$key];
						foreach ($pelis as $key_p => $value_p): ?>

						<div class="content-grid">
							<?php /// este codigo: echo $key."-".$key_p; es para crear un id personal para cada pelicula y poder hacer el popup mostrando la pelicula ?>
							<a class="play-icon popup-with-zoom-anim" href="#PELIC<?php echo $key."-".$key_p; ?>"">
								<img src="data:image/jpeg;base64,<?php echo base64_encode($value_p["imagen_Portada_Peli"]); ?>" />
							</a>
							<h3><?php echo $value_p["nombre_Peli"]; ?></h3>
							<ul>
								<li><a href="#"><img src="images/likes.png" title="likes" /></a></li>
								<li><a href="#"><img src="images/views.png" title="views" /></a></li>
								<li><a href="#"><img src="images/link.png" title="link" /></a></li>
							</ul>
							<a class="button play-icon popup-with-zoom-anim" href="#PELIC1">Mirar</a>
							<div id="PELIC<?php echo $key."-".$key_p; ?>" class="mfp-hide">
								<iframe src="https://www.youtube.com/embed/bXQCptmBQ3c" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					<?php endforeach;?>
					<div class="clearfix"> </div>

				<?php endforeach;?>
				
				<div class="right-content-heading">
					<div class="right-content-heading-left">
						<h3 class="head">M&aacutes videos</h3>
					</div>
				</div>
				
					<div class="content-grid">

						<a class="play-icon popup-with-zoom-anim" href="#PELI1"><img src="images/poster/1.jpg" title="allbum-name" /></a>
						<h3>Frozen :Una Aventura.</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#PELI1">Mirar</a>
					</div>

					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#PELI2"><img src="images/poster/2.jpg" title="allbum-name" /></a>
						<h3>El efecto Mariposa</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#PELI2">Mirar</a>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#PELI3"><img src="images/poster/3.jpg" title="allbum-name" /></a>
						<h3>Malefica</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#PELI3">Mirar</a>
					</div>
					<div class="content-grid last-grid">
						<a class="play-icon popup-with-zoom-anim" href="#PELI4"><img src="images/poster/4.jpg" title="allbum-name" /></a>
						<h3>Hansel y gretel: cazadores de brujas</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#PELI4">Mirar</a>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="PELI5"><img src="images/poster/5.jpg" title="allbum-name" /></a>
						<h3>La Noche del Demonio</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#PELI5">Mirar</a>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#PELI6"><img src="images/poster/6.jpg" title="allbum-name" /></a>
						<h3>El Conde de Montecristo</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#PELI6">Mirar</a>
					</div>
					<div class="content-grid">
						<a class="play-icon popup-with-zoom-anim" href="#PELI7"><img src="images/poster/7.jpg" title="allbum-name" /></a>
						<h3>Inframundo</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#PELI7">Mirar</a>
					</div>
					<div class="content-grid last-grid">
						<a class="play-icon popup-with-zoom-anim" href="#PELI8"><img src="images/poster/8.jpg" title="allbum-name" /></a>
						<h3>Jobs</h3>
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#PELI8">Mirar</a>
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

				<div id="PELI1" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/bXQCptmBQ3c" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI2" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/FXK0BCG807Y" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI3" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/JYO3N7LpQ6g" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI4" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/ZLbY5nxzGbY" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI5" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/2vW02jfBhjs" frameborder="0" allowfullscreen></iframe>
					</div>


					<div id="PELI6" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/eJk1OtFvl1s" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI7" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/jU2NBOTF7Qg" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI8" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/jbJ7jM-m0ic" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI9" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/NGwAu4g_1PY" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI10" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/zEGcjQ2Cr3M" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI11" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/3NmUk-y9Ri8" frameborder="0" allowfullscreen></iframe>
					</div>

					<div id="PELI12" class="mfp-hide">
						<iframe  src="https://www.youtube.com/embed/469a5aWNhKg" frameborder="0" allowfullscreen></iframe>
					</div>
					
	<?php
		require_once("footer.php");
	?>