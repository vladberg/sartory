<?php

include_once("lib/template.php");

require_once('lib/login.action.php');



	$membership = new loginAction();

  

	$membership->confirm_Member();

	$link=conectarse_servicios();

    $usuario=$_SESSION['servicios_user'];

    $coti=implode(',',$_POST['coti']);

    $hora=date('H:i:s');

    $tranx="update cotizacion set estatus=2,hora='$hora' where idcotizacion IN (".$coti.");";                   

   $rtranx=mysql_query($tranx, $link);

$idreg = mysql_insert_id($link);

$mensaje= "<h1>Datos de Contacto</h1><br/>";

$query="Select * from registro where email='$usuario';";

              $resultado=mysql_query($query, $link);

              //echo $resultado;



              $icont=0;

              $class='success';

            

              if(mysql_num_rows($resultado)>0){



                while($row = mysql_fetch_array($resultado)){ 

                  $nombre=html_entity_decode($row['nombres'], ENT_QUOTES);

                  $apellidos=html_entity_decode($row['apellidos'], ENT_QUOTES);

                  $email=$row['email'];

                  $telefono=$row['telefono'];

                }

              }

$mensaje.= "<strong>Nombre Completo: </strong>".$nombre." ".$apellidos."<br/>";

$mensaje.="<strong>Email: <strong>".$email."<br/>";

$mensaje.="<strong>Telefono: </strong>".$telefono."<br/>";

$mensaje.="<h2>Articulos Solicitados</h2><br/>"; 



$mensaje.='<table class="table table-bordered table-hover table-striped tablesorter" style="border:1px">

                <thead>

                  <tr>

                  	<th></th>

                    <th>Codigo</th>

                    <th>Nombre</th>

                    <th>Precio Venta</th>

                    <th>Unidades</th>

                    <th>Perzonalizado</th>

                    <th>Color</th>

                    <th>Precio</th>

                    

                  </tr>

                </thead>

                <tbody>';

$query="Select * from cotizacion where usuario='$usuario' and estatus=2 and fecha=CURDATE();";

							$resultado=mysql_query($query, $link);

							//echo $resultado;



							$icont=0;

							$class='success';

						

							if(mysql_num_rows($resultado)>0){



								while($row = mysql_fetch_array($resultado)){ 

                                    $precio= round($row['precio_venta'],2);

$unidad=$row['unidad'];

$multiplica= $unidad*$precio;



									$icont++;

									if($class=='success'){

								$class='active';

								}else{

									$class='success';

								}



									$laclase=($icont%2==0?"fila_par":"fila_impar");



									$imagen='no_publicado.gif';

									



									if($row['estatus']==1){



										$imagen='publicado.gif';



									}

									if($imagen=='no_publicado.gif'){

										$class='danger';

									}





$mensaje.='<tr class="'.$class .'" id="row'. $icont .'">';

$mensaje.='<td>'.$icont.'</td>';

$mensaje.='<td>'.html_entity_decode($row['codigo'], ENT_QUOTES).'</td>';

$mensaje.='<td>'.html_entity_decode($row['nombre'], ENT_QUOTES).'</td>';

$mensaje.='<td>'.round($row['precio_venta'],2).'</td>';

$mensaje.='<td>'.$row['unidad'].'</td>';

$mensaje.='<td>'.html_entity_decode($row['persona'], ENT_QUOTES).'</td>';

$mensaje.='<td>'.$row['color'].'</td>';

$mensaje.='<td>'.$multiplica.'</td>';

}

}

$mensaje.='</tr></table>';

//Librerías para el envío de mail

include_once('lib/PHPMailer/class.phpmailer.php');

include_once('lib/PHPMailer/class.smtp.php');



//Este bloque es importante

$correo = new PHPMailer();

 

$correo->IsSMTP();

 

//$correo->SMTPAuth = true;

 

//$correo->SMTPSecure = 'tls';

 

$correo->Host = "localhost";

 

//$correo->Port = 25;



$correo->Charset = "UTF-8";

$correo->SetFrom("noreply@sartory.mx", "SARTORY Cotizaciones-".$usuario."");
$correo->AddAddress("itzimna@hotmail.com", "Ventas Sartory");
$correo->AddBCC("bergman.pereira.novelo@gmail.com","Cotizaciones");

$correo->Subject = "Cotizacion de ".$usuario;



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

<!DOCTYPE html>

<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Sartory | Promocionales</title>

	

	<meta charset="utf-8">

	

	<meta name="description" content="SARTORY es una empresa de diseño, marketing y comercialización que ofrece soluciones novedosas y estrategias comerciales para su producto o negocio. Esta alianza es el resultado estratégico de la fusión de 2 empresas con años de experiencia en el Sureste de México: IDEAS PUBLICIDAD y COMERCIALIZADORA FAUR.">

	<meta name="keywords" content="Sartory publicidad, agencia de publicidad, desarrollo de sitios web, uniformes, desarrollo de productos, diseño de productos, artículos promocionales, publicidad, imagen corporativa, diseño, marca, logo, impresión digital, artículos publicitarios, logotipo, promoción, artículos publicitarios para empresas, regalos promocionales, artículos de oficina, servicio de diseño, proyecto publicitario, diseño de sitio web, artículos promocionales Mérida, promocionales económicos, artículos publicitarios merida yucatan, productos merchandising, productos publicitarios, catálogo de productos, , diseño web, diseño htm, diseño en flash, diseño gráfico, logo design, cms, php, seo, e-commerce, impresión, alojamiento web, fotografía, tarjetas de presentación, lonas publicitarias, lonas publicitarias, rotulación vehicular,  trípticos, dípticos, volantes, flyers, folletos, publicidad en papel para tortillas, artículos promocionales personalizados, publicidad en medios, productos de control de público"/>



<meta name="category" content="Sartory"/>

<meta name="author" content="Sartory | http://www.sartory.mx"/>

<meta name="reply-to" content="ventas@sartory.mx"/>

<meta name="resource-type" content="document"/>

<META name="robots" content="INDEX,FOLLOW"/> 

<meta name="revisit-after" content="1 day"/>

<link rel="shortcut icon" href="img/favico.png" type="image/x-icon">
<link rel="icon" href="img/favico.png" type="image/x-icon">

	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">

	

	<link rel="stylesheet" href="css/template.css" type="text/css">

	

	 <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--<link rel="stylesheet" href="css/responsive-tablet.css" type="text/css" />-->

	

	<!-- Delete only if you're planning to use responsive for table with meta viewport device-width=1  -->

	<link rel="stylesheet" href="css/responsive.css" type="text/css">
	

	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->




	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <style type="text/css">

.iosSlider {

    width: 100%;

    background: url(loader_dark.gif) no-repeat center center;

    height: 370px !important; }



    .img-rounded2 {

  border-radius: 50px;

}

   .img-rounded3 {

  border-radius: 10px;

}

    </style>
	<link rel="stylesheet" href="css/style.css" type="text/css">

	





</head>



<body class="">





<link rel="stylesheet" href="css/site2.css" type="text/css">



<header id="header" class="style2">

	<div class="top-header">

		<div class="container">

			<ul>

				<li>

					<a href="user.login.php" >

						<i class="fa fa-user"> <?php echo $_SESSION['servicios_user']; ?></i>

					</a>

				</li>

				<li>

					|

				</li>

				<li>

					<a href="#" onclick="document.frmlogout.submit();"><i class="fa fa-power-off"></i> Log Out</a>

				</li>

			</ul>

		</div>

	</div>

	<div class="mid-header">

		<div class="container">

			<div class="row-fluid">

				<div class="span3">

					<h1 class="main-logo">

						<a href="http://sartory.mx/">

							<img src="img/SARTORYlogo3.jpg" alt="Sartory">

							

						</a>

					</h1>

				</div>

				<div class="span9">

					

				</div>

			</div>

			</div>

</header>

 <div id="content">

            <div class="container" id="contact">



                <section>



                    <div class="row">

                    

                        <div class="col-md-12">

                            <section>

                                <div class="heading" style="text-align: center;">

                                    <h2 style="color:red">MENSAJE ENVIADO EXITOSAMENTE.</h2>

                                    <h3>En breve recibirá respuesta sobre su cotización, artículos y colores sujetos a disponibilidad.</h3>

                                    <br/><a href="index.php" style="color:#2f96b4;">MENU PRINCIPAL</a>

                                

                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



                                <p class="lead"></p>

                            </section>

                        </div>

                    </div>



                </section>



               </div>

               </div>



<footer class="footer">

    <div class="container">

		<div class="row-fluid">

			<div class="span7">

			<form name="frmlogout" id="frmlogout" action="user.login.php" method="post"><input type="hidden" name="status" id="status" value="loggedout" /></form>

				<div class="row-fluid">

					<div class="span7">

						<h3 class="s-hexagon">CATEGORIAS</h3>

						<ul class="menu">

						<?php

						$link=conectarse();

						$query="select id_categoria,categoria,imagen from categorias where estatus=1 order by categoria asc";

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $id_categoria=$row[0];

      $nombre_categoria=$row[1];

      $archivo=$row[2];



			?>

							<li><a href="articulos.php?id=<?php echo $id_categoria;?>"><?php echo $nombre_categoria;?></a></li>

							<?php }

							?>

													</ul>

					</div>

					<div class="span5">

						<div class="social-buttons">

							<h3 class="s-hexagon">SÍGUENOS</h3>

							<a href="https://www.facebook.com/sartorymx" target="_blank">

								<img src="img/social-fb.png" alt="Síguenos en Facebook">

							</a>

							<a href="https://twitter.com/sartory_mx" target="_blank">

								<img src="img/social-tw.png" alt="Síguenos en Twitter">

							</a>

							

						</div>

					</div>

				</div>

				<div class="row-fluid">

					<div class="span12">

						<div class="footer-copy">

							<a href="admin/" target="_blank" title="Ir al inicio">

								<img src="img/SARTORYlogo3.png" alt="Sartory">

							</a>

							<span>

								Copyright © 2016. <strong>Sartory</strong>. Todos los derechos reservados. <a href="#">Aviso de privacidad</a>.

							</span>

						</div>

					</div>

				</div>

			</div>

			

		</div>

	</div>

</footer>	</div>






<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css">

<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

	

	<script type="text/javascript">

	function ppOpen(panel, width){

		jQuery.prettyPhoto.close();

		setTimeout(function() {

			jQuery.fn.prettyPhoto({social_tools: false, deeplinking: false, show_title: false, default_width: width, theme:'pp_kalypso'});

			jQuery.prettyPhoto.open(panel);

		}, 300);

	} // function to open different panel within the panel

	

	jQuery(document).ready(function($) {

		jQuery("a[data-rel^='prettyPhoto'], .prettyphoto_link").prettyPhoto({theme:'pp_kalypso',social_tools:false, deeplinking:false});

		jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme:'pp_kalypso'});

		jQuery("a[data-rel^='prettyPhoto[login_panel]']").prettyPhoto({theme:'pp_kalypso', default_width:800, social_tools:false, deeplinking:false});

		

		jQuery(".prettyPhoto_transparent").click(function(e){

			e.preventDefault();

			jQuery.fn.prettyPhoto({social_tools: false, deeplinking: false, show_title: false, default_width: 980, theme:'pp_kalypso transparent', opacity: 0.95});

			jQuery.prettyPhoto.open($(this).attr('href'),'','');

		});

		

	});

	</script>





<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body></html>

