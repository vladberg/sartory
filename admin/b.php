<?
function porcentaje($cantidad,$porciento,$decimales){
return number_format($cantidad*$porciento/100 ,$decimales);
}
$cantidad="15";
$porciento="30";
$porciento =  porcentaje($cantidad,$porciento,2);
echo "el 5 por ciento de 1000 es ".$porciento.", con dos decimales";
?>