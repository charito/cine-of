<?php
	require_once("header-principal.php");
	require_once("funciones.php");

//$id_Peli=leerParam("id","");
$id_Peli=4;
$xc = conectar();
$sql1="SELECT * FROM dbcine.peliculas WHERE id_Peli='$id_Peli'";
$res1=mysqli_query($xc,$sql1);
$rowPelis=mysqli_fetch_array($res1);
$nombre_Peli=$rowPelis[1];
$duracion_Peli=$rowPelis[2];
$estreno_Peli=$rowPelis[3];
//$logo_Peli=$rowPelis[5];
$id_Director=$rowPelis[6];
$vistos_Peli=$rowPelis[7];

$sql2="SELECT nombre_Director FROM dbcine.director where id_Director = '$id_Director';";
$res2=mysqli_query($xc,$sql2);
$rowDir=mysqli_fetch_array($res2);
$nombre_Director = $rowDir[0];

$sql3="SELECT * FROM dbcine.resena where Peliculas_id_Peli = '$id_Peli';";
$res3=mysqli_query($xc,$sql3);
$rowRes=mysqli_fetch_array($res3);
$sinopsis_Resena = $rowRes[1];

$url_trailer = $rowRes[3];
$url_latino1 = $rowRes[4];
$url_latino2 = $rowRes[5];
$url_espanol = $rowRes[6];
$url_sub = $rowRes[7];


$sql4="SELECT nombre_Actor FROM dbcine.actores natural join dbcine.actores_peliculas where dbcine.actores_peliculas.id_Peli = '$id_Peli' order by 1;";
$res4=mysqli_query($xc,$sql4);
$rowAct=mysqli_fetch_array($res4);

$sql5="SELECT comentario, fecha_comentario FROM dbcine.comentarios natural join dbcine.resena where dbcine.resena.Peliculas_id_Peli = $id_Peli order by fecha_comentario = 1;";
$res5=mysqli_query($xc,$sql5);
$rowCom=mysqli_fetch_array($res5);
//$comentarios = $rowCom[0];
//$fecha_comentario = $rowCom[1];

$sql6="SELECT * FROM dbcine.categoria_peliculas natural join dbcine.categoria where dbcine.categoria_peliculas.id_Peli = $id_Peli;";
$res6=mysqli_query($xc,$sql6);
$rowCat=mysqli_fetch_array($res6);



desconectar($xc);
?>

<body>
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
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.php"><img src="" alt="" /></a>
					<p>Movie Theater</p>
				</div>
				<div class="search v-search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="reviews-section">
				<h3 class="head">Reseña de las Peliculas</h3>
					<div class="col-md-9 reviews-grids">
						<div class="review">
							<div class="movie-pic">
								<a href="single.html"><img src="images/review/r4.jpeg" alt="" /></a>
							</div>
							<div class="review-info">
								<a class="span" name="nombre_Peli"> <?php echo $nombre_Peli; ?></a>
								<p class="dirctr"><a href="">Fecha de estreno: </a><?php echo $estreno_Peli; ?> </p>
								<p class="ratingview">Critic's Rating:</p>
								<div class="rating">
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
								</div>
								<p class="ratingview">
								&nbsp;3.5/5  
								</p>
								<div class="clearfix"></div>
								<p class="ratingview c-rating">Avg Readers' Rating:</p>
								<div class="rating c-rating">
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
								</div> 	
								<p class="ratingview c-rating">								
								&nbsp; 3.3/5</p>
								<div class="clearfix"></div>
								<div class="yrw">
									<div class="dropdown-button">           			
										<select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
										<option value="0">Your rating</option>	
										<option value="1">1.Poor</option>
										<option value="2">1.5(Below average)</option>
										<option value="3">2.Average</option>
										<option value="4">2.5(Above average)</option>
										<option value="5">3.Watchable</option>
										<option value="6">3.5(Good)</option>
										<option value="7">4.5(Very good)</option>
										<option value="8">5.Outstanding</option>
									  </select>
									</div>
									<div class="rtm text-center">
										<a href="#">REVIEW THIS MOVIE</a>
									</div>
									<div class="wt text-center">
										<a href="#">WATCH THIS TRAILER</a>
									</div>
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
								<iframe width="853" height="480" src="https://www.youtube.com/embed/I1MFkzLv_HA" frameborder="0" allowfullscreen></iframe>
							</div>
	    <div class="comments-section">
	        <div class="comments-section-head">
				<div class="comments-section-head-text">
					<h3>25 Comments</h3>
				</div>
				<div class="clearfix"></div>
		    </div>
		    <div class="comments-section-grids">
		    <?php 
		    $numero_filas=mysqli_num_rows($res5);

		    
				while ($rowCom=mysqli_fetch_array($res5))

		    	{
		    		echo "<div class='comments-section-grid'>
					<div class='col-md-2 comments-section-grid-image'>
						<img src='images/eye-brow.jpg' class='img-responsive' alt='' />
					</div>
					<div class='col-md-10 comments-section-grid-text'>
						<h4><a href='#'>NOMBRE DEL PERSONO</a></h4>

						<label>"; echo $rowCom['fecha_comentario'];  echo "</label>
						<p>"; echo $rowCom['comentario']; echo "</p>
						<span><a href='#'>Reply</a></span>
						<i class='rply-arrow'></i>
					</div>
					<div class='clearfix'></div>
				</div>";
		    	}
		     ?>
			
				
				<!--<div class="comments-section-grid comments-section-middle-grid">
					<div class="col-md-2 comments-section-grid-image">
						<img src="images/beauty.jpg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-10 comments-section-grid-text">
						<h4><a href="#">MARWA ELGENDY</a></h4>
						<label>5/4/2014 at 22:00   </label>
						<p>But I must explain to you how all this idea denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound but because those who do not know how to pursue pleasure rationally encounter consequences.</p>
						<span><a href="#">Reply</a></span>
						<i class="rply-arrow"></i>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="comments-section-grid">
					<div class="col-md-2 comments-section-grid-image">
						<img src="images/stylish.jpg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-10 comments-section-grid-text">
						<h4><a href="#">MARWA ELGENDY</a></h4>
						<label>5/4/2014 at 22:00   </label>
						<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound but because those who do not know how to pursue pleasure rationally encounter consequences.</p>
						<span><a href="#">Reply</a></span>
						<i class="rply-arrow"></i>
					</div>
					<div class="clearfix"></div>
				</div>   -->
			</div>
	    </div>
	  <!-- comments-section-ends -->
		  <div class="reply-section">
			  <div class="reply-section-head">
				  <div class="reply-section-head-text">
					  <h3>Leave Reply</h3>
				  </div>
			  </div> 
			<div class="blog-form">
			    <form>
					<input type="text" class="text" value="Enter Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Name';}">
					<input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
					<input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
					<textarea></textarea>
					<input type="button" value="SUBMIT COMMENT">
			    </form>
			 </div>
		  </div>
		  </div>
					
			<!---->
			

					</div>

					<div class="clearfix"></div>
			</div>
			</div>
		
	<?php
		require_once("footer.php");
	?>
</body>
</html>