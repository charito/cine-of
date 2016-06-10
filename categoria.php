<?php
	require_once("header-principal.php");
	session_start();
	//$S_SESSION['id_Categoria'] =   */

//if (isset($_SESSION['solicitante'])) {
  
    require_once("funciones.php");
    $xc=conectar();   

    $Categorias = leerParam("categoria",false);
    if (!empty($Categorias)) {
    	echo "$Categorias";
    	///parsear categorias de string a array
    	$myArray = explode(',', $Categorias);
		echo json_encode($myArray); //convierte el array en texto en formato json

    	/// hacer un while para insertar cada catergoria de usuario
    	if (!empty($_SESSION['id_usuario'])) {
			$id_usuario=$_SESSION['id_usuario'];
		

			foreach ($myArray as $value)
			{
				
			   	$sql="INSERT INTO categoria_perfil (Perfil_id_Perfil,Categoria_id_Categoria) VALUES ($id_usuario,$value)";              
	      		mysqli_query($xc,$sql);
			}

		}

    	/// redireccionar a videos.php
    	header("Location: videos.php");
    	die();
    }
    

    require_once("header-principal.php");

      
       $sql="SELECT * FROM categoria";              
       $resultado=mysqli_query($xc,$sql)
       or die ("Error al consultar los datos");
      
       desconectar($xc);
     
?>

<style type="text/css">
	#chistes{
		position: relative;
	}
	.sobre {
		position:absolute;
		top:0px;
		left:0px;
		border:none;
	}

	.grayscale {
		-webkit-filter:grayscale(1);
	}
</style>

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
						<h3 class="head">Escoge tus categorias</h3>
					</div>
				</div>
				<!-- pop-up-box --> 
				<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
				<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
				
				 <script>
				 	var categ_selec = [];
			 		function guardar_categoria(id) {
			 			var flag=categ_selec.indexOf(id);
			 			if(flag>=0) {
			 				categ_selec.splice(flag, 1);
							$("#"+id).removeClass("grayscale");	
			 			} else {
			 				categ_selec.push(id);
							$("#"+id).addClass("grayscale");
			 			}
					}
					function post(path, params, method) {
					    method = method || "post"; // Set method to post by default if not specified.

					    // The rest of this code assumes you are not using a library.
					    // It can be made less wordy if you use one.
					    var form = document.createElement("form");
					    form.setAttribute("method", method);
					    form.setAttribute("action", path);

					    for(var key in params) {
					        if(params.hasOwnProperty(key)) {
					            var hiddenField = document.createElement("input");
					            hiddenField.setAttribute("type", "hidden");
					            hiddenField.setAttribute("name", key);
					            hiddenField.setAttribute("value", params[key]);

					            form.appendChild(hiddenField);
					         }
					    }

					    document.body.appendChild(form);
					    form.submit();
					}
	
					$(document).ready(function() {

					});


				</script>	
				<!--//pop-up-box -->

				
				<div class="content-grids">
				<?php
				 while ($extraido = mysqli_fetch_array($resultado)) {
				 ?>
					<div  class="content-grid">
						<h2><?php echo $extraido['nombre_Categoria']; ?></h2>
						<a class="play-icon popup-with-zoom-anim" href="#" onclick="guardar_categoria(<?php echo $extraido['id_Categoria']; ?>)"><img src="data:image/jpeg;base64,<?php echo base64_encode($extraido['img_Categoria']); ?>"  id="<?php echo $extraido['id_Categoria']; ?>" /></a>
						<!--images/categoria/categ1.jpg" title="allbum-name" /></a>-->
					</div>
				<?php
					}
				?>
					
					<div class="col-xs-12">
						<button class="btn btn-primary btn-block btn-flat" onclick="post('/cine-oficial/categoria.php', {categoria: categ_selec});">Continuar</button>
					</div>

					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>	
<?php
	require_once("footer.php");
?>