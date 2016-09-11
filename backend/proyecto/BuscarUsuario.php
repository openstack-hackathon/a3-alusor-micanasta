<?php
require_once('config.php');

   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);

/* ********************************************** */
/*
 `idUsuario` INT NOT NULL,
  `nombreUsuario` VARCHAR(70) NOT NULL,
  `passwordUsuario` VARCHAR(30) NOT NULL,
  `direccionUsuario` VARCHAR(100) NOT NULL,
  `telefonoUsuario` VARCHAR(15) NOT NULL,
  `correoUsuario` VARCHAR(50) NULL,
*/


$idUsuario = $_REQUEST['idUsuario'];

//REALIZAR CONSULTA
$sql = "SELECT * FROM `usuario` WHERE idUsuario = '$idUsuario'";


                $result = mysql_query($sql);
                if (! $result){
                               echo "La consulta SQL contiene errores.".mysql_error();
                               exit();
                }else {echo "$row['idUsuario'],$row['nombreUsuario'],$row['passwordUsuario'],$row['direccionUsuario'],$row['telefonoUsuario'],$row['correoUsuario']|";
                }
?>
