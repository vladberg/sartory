<?php
include_once("lib/conexion.php");
require_once('lib/login.action.php');

	$membership = new loginAction();
  
	$membership->confirm_Member();

$link=conectarse(); 
	$usuario=$_SESSION['servicios_user'];
	if($usuario == ''){
        header("Location:user.login.php");
        }
		
	
	
		$ids=$_POST['id_articulo'];
		$unidades=$_POST['unidades'];
		$color=$_POST['color'];
		$comentario=$_POST['comentario'];
		$tipo=$_POST['tipo'];
		$query="select * from articulos where id_articulo=$ids;";
		$resultado=mysql_query($query, $link);
		if(mysql_num_rows($resultado)>0){
		while($row = mysql_fetch_array($resultado)){ 
			$nombre=$row['nombre'];
			$codigo=$row['codigo'];
			$precio=round($row['precio_venta'],2);
			$personaliza=$row['personalizado'];


		}
	}
		$idc=$_GET['ids'];
		if($usuario != ''){
			for ($i=0; $i<=count($unidades); $i++) {	
		$tranx[$i]="insert into cotizacion(id_articulo,usuario,fecha,estatus,unidad,color,nombre,codigo,precio_venta,persona,comentario) values($ids,'$usuario',CURDATE(),0,$unidades[$i],'$color[$i]','$nombre','$codigo','$precio','$tipo','$comentario');";					
					$rtranx=mysql_query($tranx[$i], $link);
					$idreg = mysql_insert_id($link);
				}
		header("Location:cotizacion.php");
	}
	
?>

