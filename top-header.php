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
				<li><a id="btn_crearCuentaModal" data-toggle="modal" data-target="#modal_registro" href="#">Crear cuenta</a></li>	

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
				
				<form class="form-horizontal">
					<div class="form-group">
						<label for="crear_usuario" class="col-sm-2 control-label">Usuario</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="usuario" id="crear_usuario" placeholder="Usuario">
						</div>
					</div>
					<div class="form-group">
						<label for="crear_password" class="col-sm-2 control-label">Constraseña</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" id="crear_password" placeholder="Contraseña">
						</div>
					</div>
					<div class="form-group">
						<label for="crear_nombre" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="nombre" id="crear_nombre" placeholder="Nombre">
						</div>
						<label for="crear_apellidos" class="col-sm-2 control-label">Apellidos</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="apellidos" id="crear_apellidos" placeholder="Apellidos">
						</div>
					</div>
					<div class="form-group">
						<label for="crear_nacionalidad" class="col-sm-2 control-label">Nacionalidad</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nacionalidad" id="crear_nacionalidad" placeholder="Nacionalidad">
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button id="btn_crearcuenta" type="button" class="btn btn-danger">Crear Cuenta</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

