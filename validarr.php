<?php
session_start();
$con = new mysqli('localhost','root','root','dbcine');
$user = $_POST['user'];
$pass = $_POST['pass'];

if ($user == null || $pass == null)
{
  echo "<span>   Por favor completar todos los campos.</span>";
}
else{
$consulta = mysqli_query($con,"SELECT id_Perfil,usuario_Perfil,clave_Perfil FROM perfil WHERE usuario_Perfil='$user'  AND clave_Perfil='$pass'");


if(mysqli_num_rows($consulta)>0)
{
$_SESSION['usuario']=$user;
$extraido = mysqli_fetch_array($consulta);
$_SESSION['id_usuario']=$extraido["id_Perfil"];
echo"<script>location.href='categoria.php'</script>";

}
else
{
  $consultas = mysqli_query($con,"SELECT login_solicitante,pass_solicitante FROM solicitante WHERE login_solicitante='$user'  AND pass_solicitante='$pass'");
  if (mysqli_num_rows($consultas)>0) {

$_SESSION['solicitante']=$user;
echo"<script>location.href='descripcionTramite.php'</script>";

}
else

  echo '<span>Usuario 1y/o contraseña invalidos, intente nuevamente </span>';
}
}
?>





