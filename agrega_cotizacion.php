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
	
		$ids=$_GET['id'];
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
		$tranx="insert into cotizacion(id_articulo,usuario,fecha,estatus,nombre,codigo,precio_venta,persona) 
		values($ids,'$usuario',CURDATE(),0,'$nombre','$codigo','$precio','$personaliza');";					
					$rtranx=mysql_query($tranx, $link);
					$idreg = mysql_insert_id($link);
		header("Location:cotizacion.php");
        }
	
?>

