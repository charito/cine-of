<?php
require_once("funciones.php");
$xc = conectar();
$id_noticia = $_GET['var'];
//echo $id_Peli;

$sql5="SELECT comentario, fecha_comentario, calificacion_comentario, nombre_Perfil,foto_Perfil FROM dbcine.perfil natural join dbcine.comentarios natural join dbcine.resena where perfil.id_Perfil = comentarios.id_Perfil and dbcine.resena.Peliculas_id_Peli =$id_Peli order by fecha_comentario = -1;";

$res5=mysqli_query($xc,$sql5);


?>


	        <div class="comments-section-head">
				<div class="comments-section-head-text">
					<h3>Comentarios</h3>
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
						<img src=data:image/jpg;base64,"; echo base64_encode($rowCom['foto_Perfil']);  echo " class= img-responsive alt= />
					</div>
					<div class='col-md-10 comments-section-grid-text'>
						<h4><a href='#'>";echo $rowCom['nombre_Perfil'];  echo "</a></h4>

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
	    
	  <!-- Fin de los comentarios -->