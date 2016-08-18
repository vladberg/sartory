<?php
include_once('lib/PHPMailer/class.phpmailer.php');

include_once('lib/PHPMailer/class.smtp.php');



//Este bloque es importante
$usuario="bergman";
$correo = new PHPMailer();
$mensaje="Hola ";
$mensaje.=$usuario;
 
//$usuario=$_SESSION['servicios_user'];
$correo->IsSMTP();

 

//$correo->SMTPAuth = true;

 

//$correo->SMTPSecure = 'tls';

 

$correo->Host = "localhost";

 

//$correo->Port = 25;



$correo->Charset = "UTF-8";
$correo->SetFrom("noreply@sartory.mx", "SARTORY Cotizaciones-".$usuario."");
$correo->AddAddress("bergman.pereira.novelo@gmail.com", "Ventas Sartory");
$correo->Subject = "solicitud de ".$usuario;



$correo->Body = $mensaje;

//Para adjuntar archivo

//$mail->AddAttachment($archivo, $archivo);

$correo->MsgHTML($mensaje);

  

//Avisar si fue enviado o no y dirigir al index

if($correo->Send())

{

    

    echo'<script type="text/javascript">

            alert("ENVIADO CORRECTAMENTE");            

         </script>';

}

else{

    echo'<script type="text/javascript">

            alert("NO ENVIADO, intentar de nuevo");

         </script>';

}


?>