<?php
$id=$_GET['id'];
$estado="noticia";

if($estado == "noticia")
{
require_once("funciones.php");

	$xc=conectar();   
	



$sql1="SELECT * FROM dbcine.noticias WHERE id_Noticia='$id'";

$res1=mysqli_query($xc,$sql1);
$rowNot=mysqli_fetch_array($res1);
$titulo_Noticia=$rowNot[1];
$subtitulo_Noticia=$rowNot[2];
$fecha_Noticia=$rowNot[3];
$imagen_Noticia=$rowNot[4];
$cuerpo_Noticia=$rowNot[5];

?>



<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $titulo_Noticia; ?></h4>
      </div>
      <div class="modal-body">
       		<img class="img-rounded" src=data:image/jpg;base64,<?php echo base64_encode($imagen_Noticia); ?> />
 			<h2><?php  echo $subtitulo_Noticia ?></h2>
			 <p><?php  echo $fecha_Noticia ;?></p>
			 <p><?php  echo $cuerpo_Noticia ;?></p>
			 <p><?php  echo $id ;?></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
	
			

<?php 
}
?>




	
