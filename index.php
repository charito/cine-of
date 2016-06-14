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

	require_once("funciones.php");

	$xc=conectar();   
    $peliculas_query = "SELECT * from peliculas ORDER BY estreno_Peli DESC LIMIT 10";
    $peliculas_resultado=mysqli_query($xc,$peliculas_query);
    $peliculas_array = array();
	while ($pelicula = mysqli_fetch_array($peliculas_resultado)) {
		$peli = array();
		$peli["nombre_Peli"] = $pelicula['nombre_Peli'];
		$peli["duracion_Peli"] = $pelicula['duracion_Peli'];
		$peli["estreno_Peli"] = $pelicula['estreno_Peli'];

		$image = imagecreatefromstring($pelicula['imagen_Portada_Peli']); 
		ob_start(); //start capture of the output buffer
		imagejpeg($image, null, 80);
		$data = ob_get_contents();
		ob_end_clean();
		$peli["imagen_Portada_Peli"] = $data;

		$image = imagecreatefromstring($pelicula['logo_Peli']); 
		ob_start(); //start capture of the output buffer
		imagejpeg($image, null, 80);
		$data = ob_get_contents();
		ob_end_clean();
		$peli["logo_Peli"] = $data;
		$peliculas_array[] = $peli;
	}
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
			<?php foreach ($peliculas_array as $key => $value): ?>
				<li><img src="data:image/jpeg;base64,<?php echo base64_encode($value['imagen_Portada_Peli']); ?>" alt=""/></li>
			<?php endforeach;?>
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
		            
				<?php
					$xc = conectar();

$sql4="SELECT id_Noticia, titulo_Noticia,imagen_Noticia,subtitulo_Noticia FROM dbcine.noticias;";
$res4=mysqli_query($xc,$sql4);
$rowNot=mysqli_fetch_array($res4);

					/*		echo $rowNot['titulo_Noticia'].", ";
					while ($rowNot=mysqli_fetch_array($res4)) {
							echo $rowNot['titulo_Noticia'].", ";

							if(!)
					}

*/
echo "
	 				<div class=row>
		                <div class=col-sm-4 text-center padding wow fadeIn data-wow-duration=1000ms data-wow-delay=300ms>
		                    <div class=single-service>
		                        <div class=wow scaleIn data-wow-duration=500ms data-wow-delay=300ms>
		                            <img src=data:image/jpg;base64,"; echo base64_encode($rowNot['imagen_Noticia']); echo " alt= />
									
		                        </div>
		                        <h2>"; echo $rowNot['titulo_Noticia']; echo "</h2>
		                        <p>"; echo $rowNot['subtitulo_Noticia']; echo"</p>
		                    </div>
							</div>
		                
						 ";
						

$i=0;
$k = 2;
while ($rowNot=mysqli_fetch_array($res4)) {
  //Para corregir el problema de que se empieza a contar de 0 
 if ($k == 4 || $k == 7 || $k ==10 ){ 
 
	 			echo "</div>
	 				<div class=row>
		                <div class=col-sm-4 text-center padding wow fadeIn data-wow-duration=1000ms data-wow-delay=300ms>
		                    <div class=single-service>
		                        <div class=wow scaleIn data-wow-duration=500ms data-wow-delay=300ms>
		                            <img src=data:image/jpg;base64,"; echo base64_encode($rowNot['imagen_Noticia']); echo " />
									
		                        </div>
		                        <h2>"; echo $rowNot['titulo_Noticia'].$k; echo "</h2>
		                       <p>"; echo $rowNot['subtitulo_Noticia']; echo "</p>
							   
		                    </div>
		                </div>";

 }
 else {   
					echo "<div class=col-sm-4 text-center padding wow fadeIn data-wow-duration=1000ms data-wow-delay=300ms>
		                    <div class=single-service>
		                        <div class=wow scaleIn data-wow-duration=500ms data-wow-delay=300ms>
		                            <img onclick src=data:image/jpeg;base64,"; echo base64_encode($rowNot['imagen_Noticia']); echo " />
		                        </div>
		                        <h2>"; echo $rowNot['titulo_Noticia']; echo "</h2>
		                      <p>"; echo $rowNot['subtitulo_Noticia'].$k; echo"</p>
		                    </div> 
							 </div>
							 ";

  } 
 //{$clase = ' class="tercero"';}
 //echo '<li'.$clase.'>'.$elemento[$i].'</li>'
$k=$k+1;

}
 

					?>

		        </div>
    		</section>
			<div class="clearfix"></div>
		</div>	
	<?php
		require_once("footer.php");
	?>