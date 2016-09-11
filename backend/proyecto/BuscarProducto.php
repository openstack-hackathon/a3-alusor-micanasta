<?php
require_once('config.php');

   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);

/* ********************************************** */
/*
CREATE TABLE IF NOT EXISTS `MiCanasta`.`producto` (
  `idProducto` INT NOT NULL,
  `nombreProducto` VARCHAR(45) NOT NULL,
  `precioProducto` FLOAT NOT NULL,
  `fotoProducto` VARCHAR(150) NULL,
  `pesoProducto` FLOAT NOT NULL,
  `categoriaProducto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB;
*/

$idProducto = $_REQUEST['idProducto'];

//REALIZAR CONSULTA
$sql = "SELECT * FROM producto ";


                $result = mysql_query($sql);

                if ($row = mysql_fetch_array($result)){ 
           
            do { 
              echo "".$row['idProducto'].",".$row['nombreProducto'].",".$row['precioProducto'].",".$row['fotoProducto'].",".$row['pesoProducto'].",".$row['categoriaProducto']."|"; 
            } while ($row = mysql_fetch_array($result)); 
            echo "</table> \n"; 
        } else { 
        echo "¡ No se ha encontrado ningún registro !"; 
        } 
echo "$row['idProducto'],$row['nombreProducto'],$row['precioProducto'],$row['fotoProducto'],$row['pesoProducto'],$row['categoriaProducto']|"; 
?>


  
