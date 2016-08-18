<?
require_once("lib/excel/excel.php");  
require_once("lib/excel/excel-ext.php");
include_once("lib/conexion.php");
$link = conectarse();

$proveedor=$_GET['id'];

$proveedores=mysql_query("select nombre from proveedores where id_proveedor= $proveedor;") or die("Problemas en el SELECT:".mysql_error());

while ($reg1=mysql_fetch_assoc($proveedores)) {
	$prove=$reg1['nombre'];



$precios=mysql_query("select id_articulo,codigo,nombre,round(precio_venta,2) as pv,costos,utilidad from articulos where id_proveedor= $proveedor order by id_articulo Asc;") or die("Problemas en el SELECT:".mysql_error());
//$resultado=mysql_query($query, $link);


			while($reg=mysql_fetch_assoc($precios))

			{
			//Inicia llenado del arreglo solamente con los que tienen algun valor distinto a cero

					$datos = array(

						"Id Articulo"=>$reg['id_articulo'],
						"Codigo"=>$reg['codigo'],
						"Categoria"=>$reg['id_categoria'],
						"Nombre Producto"=>$reg['nombre'],
						"Proveedor"=>$reg1['nombre'],
						"Precio Venta"=>$reg['pv'],
						"Costo"=>$reg['costos'],
						"Utilidad"=>$reg['utilidad']
					);

					$precio[] = $datos;

				}
			}
createExcel("lista_precios_"."$prove.xls", $precio );

	exit;