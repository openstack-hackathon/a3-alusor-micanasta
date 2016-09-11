<?php
require_once('config.php');
 
   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);

/* ********************************************** */
/*
`idEmpleado` INT NOT NULL,
  `nombreEmpleado` VARCHAR(50) NOT NULL,
  `passwordEmpleado` VARCHAR(30) NOT NULL,
  `telefonoEmpleadp` VARCHAR(15) NOT NULL,
  `correoEmpleado` VARCHAR(45) NOT NULL,
  `ubicacionEmpleado` VARCHAR(25) NOT NULL,
  `fotoEmpleado` VARCHAR(150) NULL,
  */

$idEmpleado = $_REQUEST['idEmpleado'];

//REALIZAR CONSULTA
$sql = "SELECT ubicacionEmpleado FROM `empleado` WHERE idEmpleado = '$idEmpleado'";
                $result = mysql_query($sql);
                if (! $result){
                               echo "0".mysql_error();
                               exit();
                }else {echo ""$row['ubicacionEmpleado']"";
                }
?>
