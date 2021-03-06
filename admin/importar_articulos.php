<?php
	$tipo = $_FILES['archivo']['type'];
	$tamanio = $_FILES['archivo']['size'];
	$archivotmp = $_FILES['archivo']['tmp_name'];
	$respuesta = new stdClass();
	
	if( $tipo == 'application/vnd.ms-excel'){
		
		$archivo = $_FILES['archivo']['name'];
	
		if(move_uploaded_file($archivotmp, $archivo) ){
	 		$respuesta->estado = true;	
	 		$respuesta->mensaje = "El archivo se pudo subir al servidor";	
		} else {
    		$respuesta->estado = false;
			$respuesta->mensaje = "El archivo no se pudo subir al servidor, intentalo mas tarde";
		}
	
		if($respuesta->estado){
		
			$lineas = file($archivo);

			$respuesta->mensaje = "";
			$respuesta->estado = true;
			$conexion = new mysqli('localhost','root','','sartory',3306);
			foreach ($lineas as $linea_num => $linea)
			{
				$datos = explode(",",$linea);
				$codigo = trim($datos[0]);
				$categoria = trim($datos[1]);
				$nombre = trim($datos[2]);
				$precio_venta = trim($datos[3]);
				$idProveedor = trim($datos[4]);
			
	    		$consulta = "insert into articulos(codigo,categoria,nombre,precio_venta,id_proveedor) values('$codigo',$categoria,'$nombre','$precio_venta',$idProveedor);";			
				if(!$conexion->query($consulta)){			
					$respuesta->estado = false;
					$respuesta->mensaje .= "No se guardo, verifica la información \n"; 				
				}
			}
		}
		if($respuesta->estado == true)
			$respuesta->mensaje = "Todos los registros se guardaron correctamente\n";
	}
	else {
		$respuesta->mensaje = "Solo se admiten archivos .csv, vuelvelo a intentar\n";
	}
	echo json_encode($respuesta);
?>