<?php require_once("header-principal.php"); 
 require_once("funciones.php"); 
if(!isset($_SESSION)){session_start();}
$id_Perfil=$_SESSION['id_usuario'];
$xc = conectar();
$sql1="SELECT * FROM dbcine.perfil WHERE id_Perfil='$id_Perfil'";
$res1=mysqli_query($xc,$sql1);
$rowPerfil=mysqli_fetch_array($res1);
$usuario_Perfil=$rowPerfil[1];
$clave_Perfil=$rowPerfil[2];
$nombre_Perfil=$rowPerfil[3];
$apellido_Perfil=$rowPerfil[4];
$nacionalidad_Perfil=$rowPerfil[5];
$categoria_Perfil=$rowPerfil[7];
$foto_Perfil=$rowPerfil[8];
$informacion_Perfil=$rowPerfil[9];

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

<div class="row">
  <div class="col-sm-12 col-md-offset-3 col-md-6">
     
      <form method="post" action="guardarusuario.php">

            <div class="form-group">
              <label>ID usuario</label>
              <input class="form-control" name="id_Perfil" value="<?php echo $id_Perfil; ?>"  />
         </div>

          <div class="form-group">
              <label>Nombre Usuario</label>
              <input class="form-control" name="Nombre_Usuario" value="<?php echo $usuario_Perfil; ?>"  />
         </div>

          <div class="form-group">
              <label>Contraseña</label>
              <input class="form-control" name="Clave_Usuario" value="<?php echo $clave_Perfil; ?>"  />
         </div>

          <div class="form-group">
              <label>Nombre</label>
              <input class="form-control" name="Nombre_Perfil" value="<?php echo $nombre_Perfil; ?>" />
         </div>
       


          <div class="form-group">
              <label>Apelldios</label>
              <input class="form-control" name="Apellidos_Perfil" value="<?php echo $apellido_Perfil; ?>"  />
              
         </div>
          <div class="form-group">
              <label>Nacionalidad</label>
              <input class="form-control" name="Nacionalidad_Perfil" value="<?php echo $nacionalidad_Perfil; ?>"  />
              </div>
              
         <div class="form-group">
              <label>Subir Imagen</label>
              <input name="foto_Perfil" type="file" />
          </div>

          <div class="form-group">
              <label>Informacion</label>
              <input class="form-control" name="informacion_Perfil" value="<?php echo $informacion_Perfil; ?>"  />
         </div>
          
         
          <input type="text" name="accion" hidden="yes" value="editar">
         
          <button type="submit" class="btn btn-default">Guardar</button>
          <button type="reset" class="btn btn-primary">Cancelar</button>
</form>
</div>
</div>

      </div>
  </div>
  <?php
    require_once("footer.php");
  ?>