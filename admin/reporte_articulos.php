<?
require_once("lib/excel/excel.php");  
require_once("lib/excel/excel-ext.php");
include_once("lib/conexion.php");
$link = conectarse();
$icont=0;
$proveedor=$_POST['proveedor'];

$proveedores=mysql_query("select nombre from proveedores where id_proveedor= $proveedor;") or die("Problemas en el SELECT:".mysql_error());

while ($reg1=mysql_fetch_assoc($proveedores)) {
	$prove=$reg1['nombre'];



$precios=mysql_query("select id_articulo,codigo,categoria,nombre,round(precio_venta,2) as pv,id_proveedor,estatus from articulos where id_proveedor= $proveedor order by id_articulo Asc;") or die("Problemas en el SELECT:".mysql_error());
//$resultado=mysql_query($query, $link);


			while($reg=mysql_fetch_assoc($precios))

			{
				$icont++;
			//Inicia llenado del arreglo solamente con los que tienen algun valor distinto a cero

					$datos = array(

						"cons"=>$icont,
						"Id Articulo"=>$reg['id_articulo'],
						"Codigo"=>$reg['codigo'],
						"Categoria"=>$reg['categoria'],
						"Nombre Producto"=>$reg['nombre'],
						"Precio Venta"=>$reg['pv'],
						"ID Proveedor"=>$reg['id_proveedor'],
						"Estatus"=>$reg['estatus']
					);

					$precio[] = $datos;

				}
			}
createExcel("lista_articulos_"."$prove.xls", $precio );

	exit;