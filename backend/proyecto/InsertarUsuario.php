<?php
require_once('config.php');

   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);

/* ********************************************** */

$idUsuario = $_REQUEST['idUsuario'];
$nombreUsuario = $_REQUEST['nombreUsuario'];
$passwordUsuario = $_REQUEST['passwordUsuario'];
$direccionUsuario = $_REQUEST['direccionUsuario'];
$telefonoUsuario = $_REQUEST['telefonoUsuario'];
$correoUsuario = $_REQUEST['correoUsuario'];


//REALIZAR CONSULTA
$sql = "INSERT INTO `usuario`(`idUsuario`, `nombreUsuario`, `passwordUsuario`, `direccionUsuario`, `telefonoUsuario`, `correoUsuario`)
		VALUES ('$idUsuario', '$nombreUsuario', '$passwordUsuario', '$direccionUsuario', '$telefonoUsuario', '$correoUsuario')";

                $result = mysql_query($sql);
                if (!$result){
                               echo "0".mysql_error();
                               exit();
                }else {echo "1";
                }
?>