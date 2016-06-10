<?php 
//session_start();
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
	<div class="collapse navbar-collapse">>
		<ul class="nav navbar-nav navbar-right">
		
		<?php
			if(empty($username)) { ?>
				<li class="active"><a href="login.php">Login </a></li>
       			<li class="active"><a href="#">Crear cuenta</a></li>	
		<?php
		} else {?>
				<li><a href="#"><?php echo "$username"; ?></a></li>
       			<li><a href="#">Cerrar Sesion</a></li>		
			<?php }
		?>
       		
       	</ul>
	</div>
	<div class="clearfix"></div>
</div>