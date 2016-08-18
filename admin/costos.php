<?php

include_once('lib/conexion.php');



$link=conectarse();

function porcentaje($cantidad,$porciento,$decimales){

return number_format($cantidad*$porciento/100 ,$decimales);
}

$porciento="30";


$id=$_POST['id'];

//$costos=$_POST['costo'];

$utilidad=$_POST['utilidad'];

$cantidad=$_POST['precio_venta'];
$proveedor=$_POST['proveedores'];

//$buscar=substr($utilidad, 2);


for ($i=0; $i<=count($id); $i++) {

$costos[$i] =  porcentaje($cantidad[$i],$utilidad[$i],2);

$costo[$i] = $cantidad[$i] - $costos[$i];

$ppv[$i]=100-$utilidad[$i];
$ppv[$i]=".".$ppv[$i];

$precio_venta[$i]= $costo[$i] / $ppv[$i];

$tranx[$i]="update articulos set precio_venta='".$precio_venta[$i]."',costos='".$costo[$i]."',utilidad='".$utilidad[$i]."' where id_articulo=".$id[$i].";";					

$rtranx=mysql_query($tranx[$i], $link);

$idreg = mysql_insert_id($link);

}	


header("location:filtro_precios.php");

?>