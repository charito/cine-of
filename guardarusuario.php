<?php 
require_once("header-principal.php"); 
require_once("funciones.php");
$accion=leerParam("accion","");
$id_Perfil=leerParam("id_Perfil","");
$usuario_Perfil=leerParam("Nombre_Usuario","");
$clave_Perfil=leerParam("Clave_Usuario","");
$nombre_Perfil=leerParam("Nombre_Perfil","");
$apellidoPerfil=leerParam("Apellidos_Perfil","");
$nacionalidad_Perfil=leerParam("Nacionalidad_Perfil","");
$categoria_Perfil=leerParam("categoria_Perfil","");
$foto_Perfil=leerParam("foto_Perfil","");
$informacion_Perfil=leerParam("informacion_Perfil","");
$xc = conectar();

$sqleditar = "UPDATE dbcine.Perfil SET  usuario_Perfil='$usuario_Perfil', clave_Perfil='$clave_Perfil',nombre_Perfil='$nombre_Perfil', apellidos_Perfil='$apellidoPerfil',nacionalidad_Perfil='$nacionalidad_Perfil', informacion_Perfil='$informacion_Perfil'
WHERE  id_Perfil=$id_Perfil;";

echo $sqleditar;
echo $foto_Perfil;
mysqli_query($xc,$sqleditar);
desconectar($xc);

//echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasssssssssssa";
//echo $sqleditar;
//echo $accion;
//die();
	?> 

<div id="page-wrapper">
	 <META HTTP-EQUIV="REFRESH" CONTENT="0,http://localhost/cine-of/perfil2.php"> -->
            </div>

            <?php


?>
<script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>