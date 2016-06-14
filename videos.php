<?php
	require_once("header-principal.php");
	session_start();
	require_once("funciones.php");
    $xc=conectar();

    /// conocer cuantas peliculas existen en la base de datos
    $sql_numPeliculas="SELECT count(*) FROM peliculas p, resena r WHERE p.id_Peli=r.Peliculas_id_Peli";
    $numPeliculas = mysqli_query($xc,$sql_numPeliculas);
    $numPeliculas = (int) mysqli_fetch_array($numPeliculas)[0];
    /// obtener TODAS las PELICULAS con paginacion
	$current_pag = (int) leerParam("pag","1");
	$cant_pag = (int) 12;
	$ini_pag = ( $current_pag-1 ) * $cant_pag ;
	$sql_allPeliculas="SELECT p.nombre_Peli, p.duracion_Peli, p.estreno_Peli, p.imagen_Portada_Peli, p.logo_Peli, r.url_trailer FROM peliculas p, resena r WHERE p.id_Peli=r.Peliculas_id_Peli LIMIT $ini_pag,$cant_pag";
	$allPeliculas = mysqli_query($xc,$sql_allPeliculas);
	$allPeliculas_array = array();
	while ($extraido = mysqli_fetch_array($allPeliculas)) {
		$current_pelicula = array();

		$current_pelicula["nombre_Peli"] = $extraido['nombre_Peli'];
		$current_pelicula["duracion_Peli"] = $extraido['duracion_Peli'];
		$current_pelicula["estreno_Peli"] = $extraido['estreno_Peli'];
		$current_pelicula["url_trailer"] = $extraido['url_trailer'];

		/// los blobs se tienen que transformar paara guardarlos en el array
		$image = imagecreatefromstring($extraido['imagen_Portada_Peli']); 
		ob_start(); //start capture of the output buffer
		imagejpeg($image, null, 80);
		$data = ob_get_contents();
		ob_end_clean();
		$current_pelicula["imagen_Portada_Peli"] = $data;

		$image = imagecreatefromstring($extraido['logo_Peli']); 
		ob_start(); //start capture of the output buffer
		imagejpeg($image, null, 80);
		$data = ob_get_contents();
		ob_end_clean();
		$current_pelicula["logo_Peli"] = $data;

		$allPeliculas_array[] = $current_pelicula;
	}

	/// obtener peliculas por categoria de usuario

    if (!empty($_SESSION['id_usuario'])) {

    	$id_usuario=$_SESSION['id_usuario'];

    	$sql="SELECT c.id_Categoria, c.nombre_Categoria, c.img_Categoria FROM categoria_perfil cp, categoria c WHERE cp.Categoria_id_Categoria = c.id_Categoria and cp.Perfil_id_Perfil=$id_usuario";

       	$cate_resultado=mysqli_query($xc,$sql);
       	$categorias = array();
       	$categorias_vals = array();

       	while ($extraido = mysqli_fetch_array($cate_resultado)) {
			$categorias[] = $extraido['nombre_Categoria'];
			$id_categoria = $extraido['id_Categoria'];

			$sql2="SELECT p.nombre_Peli, p.duracion_Peli, p.estreno_Peli, p.imagen_Portada_Peli, p.logo_Peli, r.url_trailer FROM peliculas p, categoria_peliculas ctp, resena r WHERE p.id_Peli=ctp.id_Peli and p.id_Peli=r.Peliculas_id_Peli and ctp.id_Categoria=$id_categoria";
       		$resultadop=mysqli_query($xc,$sql2);
			
			$peliculas = array();
			while ($extraidop = mysqli_fetch_array($resultadop)) {
				$peli = array();
				$peli["nombre_Peli"] = $extraidop['nombre_Peli'];
				$peli["duracion_Peli"] = $extraidop['duracion_Peli'];
				$peli["estreno_Peli"] = $extraidop['estreno_Peli'];
				$peli["url_trailer"] = $extraidop['url_trailer'];

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
							<a class="button play-icon popup-with-zoom-anim" href="#PELIC<?php echo $key."-".$key_p; ?>">Mirar</a>
							<div id="PELIC<?php echo $key."-".$key_p; ?>" class="mfp-hide">
								<iframe src="<?php echo $value_p["url_trailer"]; ?>" frameborder="0" allowfullscreen></iframe>
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

					<?php 
						foreach ($allPeliculas_array as $key => $value): ?>

						<div class="content-grid">
							<?php /// este codigo: echo $key."-peli"; es para crear un id personal para cada pelicula y poder hacer el popup mostrando la pelicula ?>
							<a class="play-icon popup-with-zoom-anim" href="#PELIC<?php echo $key."-peli"; ?>"">
								<img src="data:image/jpeg;base64,<?php echo base64_encode($value["imagen_Portada_Peli"]); ?>" />
							</a>
							<h3><?php echo $value["nombre_Peli"]; ?></h3>
							<ul>
								<li><a href="#"><img src="images/likes.png" title="likes" /></a></li>
								<li><a href="#"><img src="images/views.png" title="views" /></a></li>
								<li><a href="#"><img src="images/link.png" title="link" /></a></li>
							</ul>
							<a class="button play-icon popup-with-zoom-anim" href="#PELIC<?php echo $key."-peli"; ?>">Mirar</a>
							<div id="PELIC<?php echo $key."-peli"; ?>" class="mfp-hide">
								<iframe src="<?php echo $value["url_trailer"]; ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
						<?php if( ((int)$key+1) % 4 == 0 ): ?>
							<div class="clearfix"> </div>
						<?php endif;?>

					<?php endforeach;?>
				
				
					<div class="clearfix"> </div>
					
					<?php 
						$num_pages = (int) ( (int)($numPeliculas-1) / (int)$cant_pag );
						$num_pages = $num_pages + 1;
						if ($num_pages > 1): ?>
							<div class="pagenation">
								<ul>

								<?php for ($i=1; $i <= $num_pages; $i++): ?>
									<li><a href="videos.php?pag=<?php echo $i;?>"><?php echo $i;?></a></li>
								<?php endfor;?>
								<?php if ($current_page != $num_pages): ?>
									<li><a href="videos.php?pag=<?php echo $i+1;?>">Siguiente</a></li>
								<?php endif;?>
									
								</ul>
							</div>
					<?php endif;?>
					
					
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
					
	<?php
		require_once("footer.php");
	?>