 <link type="text/css" rel="stylesheet" href="rating/css/stylestar.css">
        <link type="text/css" rel="stylesheet" href="rating/css/example.css">
        <script type="text/javascript" src="rating/jquery.min.js"></script>
<?php
	require_once("header-principal.php");
	require_once("funciones.php");
//SESSION_START();
//$usu = $_SESSION['usuario']
//$id_Perfil=$_SESSION['id_usuario'];
//$id_Perfil=1;
//$id_Peli=leerParam("id","");
$id_Peli=4;
$xc = conectar();
$sql1="SELECT * FROM dbcine.peliculas WHERE id_Peli='$id_Peli'";
$res1=mysqli_query($xc,$sql1);
$rowPelis=mysqli_fetch_array($res1);
$nombre_Peli=$rowPelis[1];
$duracion_Peli=$rowPelis[2];
$estreno_Peli=$rowPelis[3];
$logo_Peli=$rowPelis[5];

$id_Director=$rowPelis[6];
$vistos_Peli=$rowPelis[7];

$sql2="SELECT nombre_Director FROM dbcine.director where id_Director = '$id_Director';";
$res2=mysqli_query($xc,$sql2);
$rowDir=mysqli_fetch_array($res2);
$nombre_Director = $rowDir[0];

$sql3="SELECT * FROM dbcine.resena where Peliculas_id_Peli ='$id_Peli';";
$res3=mysqli_query($xc,$sql3);
$rowRes=mysqli_fetch_array($res3);

$id_Resena = $rowRes[0];
$sinopsis_Resena = $rowRes[1];
$url_trailer = $rowRes[3];
$url_latino1 = $rowRes[4];
$url_latino2 = $rowRes[5];
$url_espanol = $rowRes[6];
$url_sub = $rowRes[7];





$sql4="SELECT nombre_Actor FROM dbcine.actores natural join dbcine.actores_peliculas where dbcine.actores_peliculas.id_Peli = '$id_Peli' order by 1;";
$res4=mysqli_query($xc,$sql4);
$rowAct=mysqli_fetch_array($res4);


$sql5="SELECT comentario, fecha_comentario, calificacion_comentario, nombre_Perfil,foto_Perfil FROM dbcine.perfil natural join dbcine.comentarios natural join dbcine.resena where perfil.id_Perfil = comentarios.id_Perfil and dbcine.resena.Peliculas_id_Peli ='$id_Peli' order by fecha_comentario = 1;";

$res5=mysqli_query($xc,$sql5);
$rowCom=mysqli_fetch_array($res5);
//$comentarios = $rowCom[0];
//$fecha_comentario = $rowCom[1];


$sql6="SELECT * FROM dbcine.categoria_peliculas natural join dbcine.categoria where dbcine.categoria_peliculas.id_Peli = $id_Peli;";
$res6=mysqli_query($xc,$sql6);
$rowCat=mysqli_fetch_array($res6);



$sql7="INSERT INTO dbcine.comentarios(comentario,fecha_comentario, calificacion_comentario, id_Resena, id_Perfil) VALUES ('jojojojojo', '12-12-12', '', '1', '1');";


$post_id = '1';
desconectar($xc);
?>

<body onload="cargaContenido(<?php echo $id_Peli; ?>)">

	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a href="index.php"><div class="hm"><i class="home1"></i><i class="home2"></i></div></a></li>
					<li><a href="videos.php"><div class="video"><i class="videos"></i><i class="videos1"></i></div></a></li>
					<li><a class="active" href="reviews.php"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
					<li><a href="404.php"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li>
					<li><a href="contact.php"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
				</ul>
			</div>
		<div class="main">
		<div class="single-content">
			

			<?php
				require_once("top-header.php");
			?>
			<div class="reviews-section">
				<h3 class="head">Reseña de las Peliculas</h3>
					<div class="col-md-9 reviews-grids">
						<div class="review">
							<div class="movie-pic">		
								<a href=""><img src="data:image/jpg;base64,<?php echo base64_encode($logo_Peli);?>"></a>
							</div>
							<div class="review-info">
								<a class="span" name="nombre_Peli"> <?php echo $nombre_Peli; ?></a>
								<p class="dirctr"><a href="">Fecha de estreno: </a><?php echo $estreno_Peli; ?> </p>
								<p class="ratingview">TU CALIFICACIÒN :</p>
								<p class="ratingview"></p>


								<div class="tuto-cnt">
								<div class="rate-ex1-cnt">
									<div id="1" class="rate-btn-1 rate-btn"></div>
									<div id="2" class="rate-btn-2 rate-btn"></div>
									<div id="3" class="rate-btn-3 rate-btn"></div>
									<div id="4" class="rate-btn-4 rate-btn"></div>
									<div id="5" class="rate-btn-5 rate-btn"></div>
								</div>
								</div>
								
								<input type="button" class="btn btn-default" value="Cargar" onclick="cargar()">	
		<hr>
			<div id="divResultado" onclick="cargar(<?php echo $id_Peli; ?>)">
	      
           <?php
		
            $xc = conectar();
            $sql= "SELECT * FROM wcd_rate WHERE id_post = $post_id ";
                $query = mysqli_query($xc, $sql); 
                while($data = mysqli_fetch_assoc($query)){
                    $rate_db[] = $data;
                    $sum_rates[] = $data['rate'];
                }
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                    $sum_rates = array_sum($sum_rates);
                    $rate_value = $sum_rates/$rate_times;
                    $rate_bg = (($rate_value)/5)*100;
                }else{
                    $rate_times = 0;
                    $rate_value = 0;
                    $rate_bg = 0;
                }
                
            ?>

		
	  


            <hr>
            <h3>Esta pelicula fuè calificada ... <strong><?php echo $rate_times; ?></strong> veces.</h3>
            <hr>
            <h3>La calificaciòn de la pelicula: <strong><?php echo $rate_value; ?></strong> .</h3>
            <hr>
			  
            <div class="rate-result-cnt">
            <div class="rate-stars"></div>
                <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                </div>
           
            <hr>

        </div><!-- /rate-result-cnt -->

    </div><!-- /tuto-cnt -->


							<!--	
							
									<div class="rtm text-center">
										<a href="#">REVIEW THIS MOVIE</a>
									</div>
									<div class="wt text-center">
										<a href="#">WATCH THIS TRAILER</a>
									</div> -->
									<div class="clearfix"></div>
								</div>
								<p class="info">CAST:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
								<?php while ($rowAct=mysqli_fetch_array($res4)) 
								{
									echo $rowAct['nombre_Actor'].", "; 
									
								}
								  ?>

								   </p>
								<p class="info">DIRECTOR: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_Director; ?></p>
								<p class="info">GÉNERO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php while ($rowCat=mysqli_fetch_array($res6)) 
								{
								echo $rowCat['nombre_Categoria'].", "; 
									
								}
								  ?>

								</p>
								<p class="info">DURACIÓN:&nbsp;&nbsp;&nbsp; &nbsp; <?php echo $duracion_Peli; ?> minutos </p>
							</div>
							<div class="clearfix"></div>
						</div>
						
						
						<!--
						<div class="single">
							<h3>Lorem Ipsum IS A TENSE, TAUT, COMPELLING THRILLER</h3>
							<p>STORY:<i> Meera and Arjun drive down Lorem Ipsum - can they survive a highway from hell?</i></p>
						</div>
							<div class="best-review">
								<h4>Best Reader's Review</h4>
								<p>Excellent Movie and great performance by Lorem, one of the finest thriller of recent  like Aldus PageMaker including versions of Lorem Ipsum.</p>
								<p><span>Neeraj Upadhyay (Noida)</span> 16/03/2015 at 12:14 PM</p>
							</div>
							-->
							<div class="story-review">
								<h4>RESEÑA:</h4>
								<p><?php echo $sinopsis_Resena; ?></p>
							</div>
							<!-- comments-section-starts -->
							<div class="story-review">
							<h4>TRAILER:</h4>
								<iframe width="853" height="480" src=<?php echo $url_trailer; ?> frameborder="0" allowfullscreen></iframe>
							</div>
<!--inicio de los comentarios -->
	    <div class="comments-section" id="divComentarios">
	    
	    </div>

	  <!-- Fin de los comentarios -->
	  <div id="divCarga"></div>
		  <div class="reply-section">
			  <div class="reply-section-head">
				  <div class="reply-section-head-text">
					  <h3>Deja tu comentario</h3>
				  </div>
			  </div> 
			<div class="blog-form">
			    <form >
					<input type="text" class="text"  id="comentario" value="" size="100">
					
					
					<input type="button" class="btn btn-default" value="Guardar" onclick="guardaContenido(comentario.value,<?php 
					echo $id_Peli;?>,<?php echo $id_Resena;?>, <?php echo $id_Perfil;?>),cargaContenido(<?php echo $id_Peli; ?>)">
					<input type="button-control" class="btn btn-default" value="actualizar"onclick="cargaContenido(<?php echo $id_Peli; ?>)"
			    </form>
			 </div>
		  </div>
		  </div>
					
			<!---->
			

					</div>
<div id="divCarga"></div>
					<div class="clearfix"></div>
			</div>
			</div>
		
	<?php
		require_once("footer.php");
	?>
	   <script>
    function cargar()
{

	$.ajax({
			
			url: 'rating/cargar.php',
			type: 'post',
			
			success: function (response)
			{
                //debugger;
				$("#resultado").html(response);
			}
		});
}
        // rating script
        $(function(){ 
            $('.rate-btn').hover(function(){
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });
               
          
            $('.rate-btn').click(function(){    
              
                var therate = $(this).attr('id');
                var dataRate = 'act=rate&post_id=<?php echo $post_id; ?>&rate='+therate; //
                $('.rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-active');
                    cargar();
                };

                $.ajax({
                    
                    type : 'post',
                    url : 'rating/ajax.php',
                    data: dataRate,
                    
                    success:function(response)
                    {
                  //debugger;
                        
                        $("#resultado").html(response);
                    }
                    
                });
                
            });
        });


    </script>
</body>
</html>