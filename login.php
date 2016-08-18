<?php
include_once('lib/conexion.php');
$link=conectarse();
$user=$_POST['nombre'];
$pwd=$_POST['psswd'];
echo $busca = "select estatus,nombres,usuario,id from registro where usuario = '$user' and pass = '$pwd';";
$resultado=mysql_query($busca, $link);
if(mysql_num_rows($resultado)>0){
$row = mysql_fetch_row($resultado);
$id_usuario = $row[3];
$estatus=$row[0];
$_SESSION['cotizacion'] = $row[2];
}
if($estatus == 1){
header("Location:cotizacion.php");
}
if($estatus == 0){
	return "Error al ingresar al sistema";
	header("Location:user.login.php");
}
 ?>