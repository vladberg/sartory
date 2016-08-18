<?php
function porcentaje($cantidad,$porciento,$decimales){

return number_format($cantidad*$porciento/100 ,$decimales);
}
function porcentaje1($cantidad1,$porciento,$decimales){

return number_format($cantidad1*$porciento/100 ,$decimales);
}


echo $cantidad=215;
echo "<br/>";
$utilidad=30;

$costos =  porcentaje($cantidad,$utilidad,2);

$costo= $cantidad - $costos;
echo "costo = ".$costo."<br/>";

echo $ppv=100-$utilidad;
echo "<br/>";
echo $cantidad1=$costo;
echo "<br/>";
//echo $precio_venta = porcentaje1($cantidad1,$ppv,2);
echo "<br/>";
echo $ppv=".".$ppv;
echo $precio_ventas = $cantidad1 / $ppv;

echo "precio venta = ".$precio_ventas;


?>