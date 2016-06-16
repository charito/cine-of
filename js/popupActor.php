<?php
$id=$_GET['id'];
require_once("funciones.php");

	$xc=conectar();   
	
$sql1="SELECT * FROM dbcine.actores WHERE id_Actor='$id'";

$res1=mysqli_query($xc,$sql1);
$rowNot=mysqli_fetch_array($res1);
$nombre_Actor=$rowNot[1];
$fecha_nacimiento=$rowNot[2];
$biografia_actor=$rowNot[3];
$foto_actor=$rowNot[4];
?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       		<img class="img-rounded" src=data:image/jpg;base64,<?php echo base64_encode($foto_actor); ?> />
 			<h2><?php  echo $nombre_Actor ?></h2>
			 <p><?php  echo $fecha_nacimiento ;?></p>
			 <p><?php  echo $biografia_actor ;?></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
	
			

<?php 

?>




	
