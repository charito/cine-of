<?php
require_once("header-principal.php");
	require_once("funciones.php");
$id_noticia="1" 	;
$xc = conectar();	
$sql1="SELECT * FROM dbcine.noticias WHERE id_noticia='$id_noticia'";
$res1=mysqli_query($xc,$sql1);
$rowNoticia=mysqli_fetch_array($res1);
$titulo_Noticia=$rowNoticia[1];
$subtitulo_Noticia=$rowNoticia[2];
$Fecha_Noticia=$rowNoticia[3];
$imagen_Noticia=$rowNoticia[4];
$cuerpo_Noticia=$rowNoticia[5];
$url_Noticia=$rowNoticia[6];
$tags=$rowNoticia[7];
desconectar($xc);
?>
<body>
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
				<h3 class="head">NOTICIAS</h3>
					<div class="col-md-12 reviews-grids">
						
					
							<div class="story-review" >
								<BR><h4><?php echo $subtitulo_Noticia; ?></h4></br>
							<center>	<a href="single.html"><img src="data:image/jpeg;base64,<?php echo base64_encode($imagen_Noticia);?>class=img-responsive alt=" ></a></center>	
							<pre>	<p><?php echo $cuerpo_Noticia; ?></p> </pre>
							</div>
					 </div>
					  <div class="reply-section">
			  <div class="reply-section-head">
				  <div class="reply-section-head-text">

					  <h3>Comentarios		</h3>
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
	<?php
		require_once("footer.php");
	?>

			</body>
</html>