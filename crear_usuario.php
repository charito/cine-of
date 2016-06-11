<?php
require_once("funciones.php");


$usuario = leerParam("usuario", "");
$password = leerParam("password", "");
$nombre = leerParam("nombre", "");
$apellidos = leerParam("apellidos", "");
$nacionalidad = leerParam("nacionalidad", "");

$con = conectar();
$query = "INSERT into perfil(usuario_Perfil,clave_Perfil,nombre_Perfil,apellidos_Perfil,nacionalidad_Perfil) VALUES ('$usuario','$password','$nombre','$apellidos','$nacionalidad')";

if(mysqli_query($con,$query)){
    $response_array['status'] = 'success';
}else {
    $response_array['status'] = 'error';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>
