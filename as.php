<?php
$busca=$_POST['buscar'];
$cadena_de_texto = $busca;
$cadena_buscada1   = '#';
$cadena_buscada   = '*';
$posicion_coincidencia1 = strpos($cadena_de_texto, $cadena_buscada1);
$posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);

if($busca !=''){
	if($posicion_coincidencia1 === false){


	} 
	else {
		$buscar=substr($busca, 1);
		echo 'contiene #';
		
	}
	if($posicion_coincidencia=== false){

	}else{
		$buscar=substr($busca, 1);
		echo 'contiene *';
	}
}
?>
<form action="" method="post">
	<input type="text" name="buscar" value="">
	<input type="submit" value="ga">
</form>