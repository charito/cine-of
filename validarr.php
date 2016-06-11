<?php
if(!isset($_SESSION)) session_start();

require_once("funciones.php");

$usuario = leerParam("usuario", "");
$password = leerParam("password", "");

$con = conectar();
$query = "SELECT id_Perfil,usuario_Perfil,clave_Perfil FROM perfil WHERE usuario_Perfil='$usuario'  AND clave_Perfil='$password'";

$resultados = mysqli_query($con,$query);

if($resultados){
	if (mysqli_num_rows($resultados)>0) {
		
		$fila1 = mysqli_fetch_array($resultados);
		$_SESSION['usuario']=$fila1["usuario_Perfil"];
		$_SESSION['id_usuario']=$fila1["id_Perfil"];
		
		$response_array['status'] = 'encontrado';
	} else {
		$response_array['status'] = 'noEncontrado';
	}
} else {
	$response_array['status'] = 'error';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>