<?php
require_once('config.php');

   $con = mysql_connect(HOSTNAME,USER,PASSWORD); 
 
   $database = mysql_select_db(DBNAME,$con);

/* ********************************************** */

$idProducto = $_REQUEST['idProducto'];
$nombreProducto = $_REQUEST['nombreProducto'];
$precioProducto = $_REQUEST['precioProducto'];
$fotoProducto = $_REQUEST['fotoProducto'];
$pesoProducto = $_REQUEST['pesoProducto'];
$categoriaProducto = $_REQUEST['categoriaProducto'];

//REALIZAR CONSULTA
$sql = "INSERT INTO producto(`idProducto`, `nombreProducto`, `precioProducto`,`fotoProducto`, `pesoProducto`, `categoriaProducto`)
		VALUES ('$idProducto', '$nombreProducto', '$precioProducto', '$fotoProducto', '$pesoProducto', '$categoriaProducto')";

                $result = mysql_query($sql);
                if (! $result){
                               echo "0".mysql_error();
                               exit();
                }else {echo "1";
                }
?>
