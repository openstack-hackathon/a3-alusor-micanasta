<?php
require_once('config.php');

   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);


$idEmpleado = $_REQUEST['idEmpleado'];
$passwordEmpleado = $_REQUEST['passwordEmpleado'];


//REALIZAR CONSULTA
$sql = "SELECT * FROM `empleado` WHERE idEmpleado = '$idEmpleado' AND passwordEmpleado = '$passwordEmpleado'";


                $result = mysql_query($sql);
                if (! $result){
                               echo "0".mysql_error();
                               exit();
                }else {echo "1";
                }
?>
