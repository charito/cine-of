<?php 
//change the values with your own hosting setting
 $mysql_host = "localhost";
 $mysql_database = "dbcine";
 $mysql_user = "root";
 $mysql_password = "";

 /*$db = mysqli_connect($mysql_host,$mysql_user,$mysql_password);
 mysqli_connect($mysql_host,$mysql_user,$mysql_password);
 mysqli_select_db($db,$mysql_database);*/

 function conectar() {
    
 $mysql_host = "localhost";
 $mysql_database = "dbcine";
 $mysql_user = "root";
 $mysql_password = "";

    $xc = mysqli_connect($mysql_host,$mysql_user,$mysql_password);
    mysqli_select_db($xc,"dbcine");
    /*$xc = mysqli_connect("localhost","root","");
     mysqli_select_db($xc,"dbcine");*/
     return $xc;
  }

  function desconectar($xc) {
     mysqli_close( $xc );
  }
?>