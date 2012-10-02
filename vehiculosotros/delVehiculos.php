<?php
require('../clases/vehiculos.class.php');

$codigo=$_GET['id'];
$objVehiculos=new Vehiculos;
if( $objVehiculos->delVehiculos($codigo) == true){
        echo "<script languaje=javascript>\n"; 
		echo "location.href ='../';";					
		echo "</script>"
}else{
        echo "Ocurrio un error";
}
?>