<?php
require_once('config.php');

   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);

/* ********************************************** */

$idPedido = $_REQUEST['idPedido'];
$precioPedido = $_REQUEST['precioPedido'];
$direccionPedido = $_REQUEST['direccionPedido'];
$destinatarioPedido = $_REQUEST['destinatarioPedido'];
$pesoPedido = $_REQUEST['pesoPedido'];
$estadoPedido = $_REQUEST['estadoPedido'];
$idUsuario = $_REQUEST['idUsuario'];
$idEmpleado = $_REQUEST['idEmpleado'];


//REALIZAR CONSULTA
$sql = "INSERT INTO pedido(`idPedido`, `precioPedido`, `direccionPedido`,`destinatarioPedido`, `pesoPedido`, `estadoPedido`, `idUsuario`, `idEmpleado`)
		VALUES ('$idPedido', '$precioPedido', '$direccionPedido', '$destinatarioPedido', '$pesoPedido', '$estadoPedido', '$idUsuario', '$idEmpleado')";

                $result = mysql_query($sql);
                if (! $result){
                               echo "0".mysql_error();
                               exit();
                }else {echo "1";
                }
?>

