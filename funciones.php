<?php
  // funciones PHP
  function leerParam($param, $default) {
     if ( isset($_POST["$param"] ) )
        return $_POST["$param"];
     if ( isset($_GET["$param"] ) )
        return $_GET["$param"];
     return $default;
  }
  function conectar() {
     $xc = mysqli_connect("localhost","root","root");
     mysqli_select_db($xc,"dbcine");
     return $xc;
  }

  function desconectar($xc) {
     mysqli_close( $xc );
  }
?>
