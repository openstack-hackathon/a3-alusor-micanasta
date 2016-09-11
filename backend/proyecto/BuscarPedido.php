<?php
require_once('config');

   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);

/* ********************************************** */
/*
CREATE TABLE IF NOT EXISTS `MiCanasta`.`pedido` (
  `idPedido` INT NOT NULL,
  `precioPedido` FLOAT NOT NULL,
  `direccionPedido` VARCHAR(100) NOT NULL,
  `destinatarioPedido` VARCHAR(45) NOT NULL,
  `pesoPedido` FLOAT NOT NULL,
  `estadoPedido` TINYINT(1) NOT NULL,
  `idUsuario` INT NOT NULL,
  `idEmpleado` INT NOT NULL,

*/

$idPedido = $_REQUEST['idPedido'];


//REALIZAR CONSULTA
$sql = "SELECT * FROM `pedido` WHERE idPedido = '$idPedido'";


                $result = mysql_query($sql);
                if (! $result){
                               echo "La consulta SQL contiene errores.".mysql_error();
                               exit();
                }else {echo "$row['idPedido'],$row['precioPedido'],$row['direccionPedido'],$row['destinatarioPedido'],$row['pesoPedido'],$row['estadoPedido'],$row['idUsuario'],$row['idEmpleado']|";
                }
?>

