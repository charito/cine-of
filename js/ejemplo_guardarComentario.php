<?php 
require_once("funciones.php");
$comentario=$_GET['com'];
$id_Peli=$_GET['var'];
$id_Resena=$_GET['res'];
$id_Perfil=$_GET['per'];
//echo $comentario;
$xc = conectar();

$date=new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d-H-i-s');
//echo $result;
//echo "<br>";
$krr = explode('-',$result);
//echo "<br>";
$result = implode("",$krr);
//echo $result;

$sql = "INSERT INTO dbcine.comentarios(comentario,fecha_comentario, calificacion_comentario, id_Resena, id_Perfil) VALUES ('$comentario', $result, '5', '$id_Resena', '$id_Perfil');";
  mysqli_query($xc,$sql);
   desconectar($xc);

 // echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
 //echo $sql;
 //echo $accion;

?>