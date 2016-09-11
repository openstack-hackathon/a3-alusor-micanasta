<?php
require_once('config.php');

   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);



$idUsuario = $_REQUEST['idUsuario'];
$passwordUsuario = $_REQUEST['passwordUsuario'];


//REALIZAR CONSULTA
$sql = "SELECT * FROM `usuario` WHERE idUsuario = '$idUsuario' AND passwordUsuario = '$passwordUsuario'";


                $result = mysql_query($sql);
                if (! $result){
                               echo "1".mysql_error();
                               exit();
                }else {echo "0";
                }
?>