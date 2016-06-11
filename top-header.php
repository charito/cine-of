<?php 
if(!isset($_SESSION)){session_start();}
require_once("header-principal.php");
require_once("funciones.php");
if (!empty($_SESSION['usuario'])) {
	$username=$_SESSION['usuario'];
}

//$password=$_SESSION[''];

 ?>
<div class="top-header">
	<div class="logo">
		<a href="index.php"><img src="images/icon/logo.jpg" alt="" /></a>
		<p>Peliculas</p>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
		
		<?php
			if(empty($username)) { ?>
				<li class="active"><a href="login.php">Login </a></li>
       	<li><a id="boton_crearCuenta" data-toggle="modal" data-target="#modal_registro" href="#">Crear cuenta</a></li>	

		<?php
		} else {?>
				<li><a href="#"><?php echo "$username"; ?></a></li>
       			<li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>		
			<?php }
		?>
       		
       	</ul>
	</div>
	<div class="clearfix"></div>
</div>


<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registrarme</h4>
      </div>
      <div class="modal-body">
        
        <form>
	        <div class="form-group">
				    <label for="exampleInputEmail1">Usuario</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Clave</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  
				  <div class="checkbox">
				    <label>
				      <input type="checkbox"> Check me out
				    </label>
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>

			  </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Crear Cuenta</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

