<?php

include_once("lib/template.php");



$link=conectarse();



if($_POST ){



$nombre = Formatear($_POST['nombre']);

$apellido = Formatear($_POST['apellido']);

$email = $_POST['email'];

$telefono = $_POST['telefono'];

$pass = $_POST['pass'];

$empresa=$_POST['empresa'];

$publicar=0;



    		if ($_POST["publicar"]=='on'){



				$publicar=1;



			}

$consulta="select * from registro where usuario='".$email."';";

$resultado=mysql_query($consulta,$link) or die (mysql_error());

if (mysql_num_rows($resultado)>0)

{

$m="Este correo se encuentra registrado, favor de utilizar otro.";

$estatus="ERROR";

} else {







$tranx="insert into registro (nombres,apellidos,email,telefono,usuario,pass,estatus,pass2,empresa,promo,registro) values('$nombre', '$apellido','$email','$telefono','$email',MD5('$pass'),1,'$pass','$empresa',$publicar,NOW())";



$rtranx=mysql_query($tranx, $link);



$idreg = mysql_insert_id($link);



if(!$rtranx) 



					{



						mysql_query("ROLLBACK");



						//deleteFiles($ruta_files.$HTTP_POST_FILES["filefoto"]['name']);



						$estatus="ERROR";



					}



					else{



						mysql_query("COMMIT");



						$estatus="OK";



					}

}

}





  function Formatear($cadena) {

   

   $cadena = str_replace("á", "&aacute;", $cadena);

   $cadena = str_replace("é", "&eacute;", $cadena);

   $cadena = str_replace("í", "&iacute;", $cadena);

   $cadena = str_replace("ó", "&oacute;", $cadena);

   $cadena = str_replace("ú", "&uacute;", $cadena);

   $cadena = str_replace("Á", "&Aacute;", $cadena);

   $cadena = str_replace("É", "&Eacute;", $cadena);

   $cadena = str_replace("Í", "&Iacute;", $cadena);

   $cadena = str_replace("Ó", "&Oacute;", $cadena);

   $cadena = str_replace("Ú", "&Uacute;", $cadena);

   $cadena = str_replace("Ñ", "&Ntilde;", $cadena);

   $cadena = str_replace("ñ", "&ntilde;", $cadena);

   $cadena = str_replace("Ú", " &Uuml;", $cadena);

   $cadena = str_replace("ú", "&uuml;", $cadena);

   return $cadena;

}









?>

<!DOCTYPE html>

<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script src="../js/twitterlib.js"></script>

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

<link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">

<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">

<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">

<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">

<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">

<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">

<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">

<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">

<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">

<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">

<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">

<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">

<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

<link rel="manifest" href="/manifest.json">

<meta name="msapplication-TileColor" content="#ffffff">

<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">

<meta name="theme-color" content="#ffffff">    

	

	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">

	<link rel="stylesheet" href="css/superfish.css" type="text/css">

	<link rel="stylesheet" href="css/template.css" type="text/css">

	<link rel="stylesheet" href="css/custom.css" type="text/css">

	

	<!-- UNCOMMENT BELOW IF YOU WANT RESPONSIVE LAYOUT FOR TABLET with device width -->

	 <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--<link rel="stylesheet" href="css/responsive-tablet.css" type="text/css" />-->

	

	<!-- Delete only if you're planning to use responsive for table with meta viewport device-width=1  -->

	<link rel="stylesheet" href="css/responsive.css" type="text/css">

	

	<link rel="stylesheet" href="css/css" type="text/css" media="screen" id="google_font">

	<link rel="stylesheet" href="css/css(1)" type="text/css" media="screen" id="google_font_body">

	

	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->



	<script src="js/jquery.min.js"></script>

	<style type="text/css"></style>

	<script>window.jQuery || document.write('<script src="js/jquery-1.8.2.min.js">\x3C/script>')</script>

	<script src="js/jquery.noconflict.js" type="text/javascript"></script>

	<script src="js/modernizr.min.js" type="text/javascript"></script>

	<link href="css/owl.carousel.css" rel="stylesheet">

    <link href="css/owl.theme.css" rel="stylesheet">

    <style type="text/css">

.iosSlider {

    width: 100%;

    background: url(loader_dark.gif) no-repeat center center;

    height: 370px !important; 



    </style>

	

	

	

	<!--[if lte IE 9]>

		<link rel="stylesheet" type="text/css" href="http://impressline.com.mx/css/fixes.css" />

	<![endif]-->

	

	<!--[if lte IE 8]>

		<script src="http://impressline.com.mx/js/respond.js"></script>

		<script type="text/javascript"> 

            var $buoop = {vs:{i:8,f:6,o:10.6,s:4,n:9}} 

            $buoop.ol = window.onload; 

            window.onload=function(){ 

             try {if ($buoop.ol) $buoop.ol();}catch (e) {} 

             var e = document.createElement("script"); 

             e.setAttribute("type", "text/javascript"); 

             e.setAttribute("src", "http://browser-update.org/update.js"); 

             document.body.appendChild(e); 

            } 

		</script> 

	<![endif]-->

	

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

	<!--[if lt IE 9]>

	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->

	

	<meta property="og:title" content="Sartory Catalogo de Productos">

	<meta property="og:type" content="website">

	<meta property="og:url" content="http://www.sartory.mx/">

	<meta property="og:image" content="http://www.sartory.mx/images/logo.png">

	<meta property="og:site_name" content="Catalogo Sartory">

	<meta property="fb:app_id" content=""> <!-- PUT HERE YOUR OWN APP ID - you could get errors if you don't use this one -->

	<meta property="og:description" content="">

	

	<link rel="stylesheet" href="css/style.css" type="text/css">

    <style>

    .product-list-item .details p.desc {

    font-size: 12px;

    font-style: italic;

    color: #939393;

    line-height: 1.3;

    padding-top: 15px;

}

    </style>

	





</head>



<body class="">





	<div id="page_wrapper">

		

		<link href="./index_files/css(2)" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/site2.css" type="text/css">



<header id="header" class="style2">

	<div class="top-header">

		<div class="container">

			<ul>

				<li>

					<?php echo $usuario;?>

				</li>

				<li>

					|

				</li>

				<li>

					<?php echo $log;?>

				</li>

			</ul>

		</div>

	</div>

	<div class="mid-header">

		<div class="container">

			<div class="row-fluid">

				<div class="span3">

					<h1 class="main-logo">

						<a href="http://www.sartory.mx">

							<img src="img/SARTORYlogo3.jpg" alt="Sartory">

							

						</a>

					</h1>

				</div>

				<div class="span9">

					<ul class="top-menu">

					<li class="with-margin"></li>

						<li>

							<div class="search-content">

								

							</div>

						</li>

						<li class="with-margin">

							<a href="contacto.php">

								<ul class="inline">

									<li>

										

									</li>

									<li>

										

									</li>

								</ul>

								

								

							</a>

						</li>

						

						

					</ul>

				</div>

			</div>

			</div>

</header>

<script language="JavaScript" type="text/javascript">

function click(){

if(event.button==2){

alert(' Boton derecho deshabilitado');

}

}

document.onmousedown=click

//-->

</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script language="javascript" src="js/datevalid.js" type="text/javascript"></script>



<script language="javascript" src="js/jquery-1.2.6.min.js" type="text/javascript"></script>

<script type="text/javascript">

    $(function () {

        $("#btnSubmit").click(function () {

            var password = $("#pass").val();

            var confirmPassword = $("#pass2").val();





            if (password != confirmPassword) {

                alert("Las contraseñas no son iguales.");

                return false;

            }

            return true;



        

        });

    });

$(function () {

        $("#btnSubmit").click(function () {

             var email = $("#email").val();

            var confirmemail = $("#email2").val();

                if (email != confirmemail) {

                alert("Los email no son iguales.");

                return false;

            }

            return true;

             });

    });



function admRegistroupd() { 

   extensiones_permitidas = new Array(".jpg",".png"); 

   mierror = "";



    var msgError = "";



    if($("#nombre").val() == ''){



		msgError = msgError + "- Nombres.\n";



	}

        if($("#apellido").val() == ''){



		msgError = msgError + "- Apellido.\n";



	}

	

    if($("#email").val() == ''){



		msgError = msgError + "- Correo Electrónico.\n";



	}



	if($("#pass").val() == ''){



		msgError = msgError + "- Clave.\n";



	}

    

	if($("#empresa").val() == ''){



    	msgError = msgError + "- Empresa.\n";



	}

    

	if($("#telefono").val() == ''){



		msgError = msgError + "- Telefono.\n";



	}







	/*if($("#hiurl").val() == ''){



		if($("#filefoto").val() == ''){



			msgError = msgError + "- Archivo de la Notificación.\n";



		}

		



	}

	

	



	if($("#piefoto").val() == ''){



		msgError = msgError + "- Pie de Foto.\n";



	}*/



	// para validar la fecha mm/dd/yyyy



	/*var dt=$("#cbmes").val()+"/"+$("#cbdia").val()+"/"+$("#cbanio").val();



	if (isDate(dt)==false){



		msgError = msgError + "- Fecha no válida.\n";



	}*/



	if(msgError != ""){



		alert("Por favor, escriba información en los siguientes campos:\n"+msgError);



		return false;



	}



	$("#opc").val("SAVE");



	$("#form").submit();



}



</script>

<script type="text/javascript">

	function confirmar ( mensaje ) { 

return confirm( mensaje ); 

} 

<!--  

</script>

<style>



#msgContainer{



	padding-top:10px;



	padding-bottom:10px;



	text-align:center;



	font-family:Verdana, Arial, Helvetica, sans-serif;



	font-size:12px;



	width:100%;



}







#msgContainer a{



	text-decoration:none;



	color:#0066FF;



}







div.saved{



	background:#99FF99;



	border-top:1px solid #339900;



	border-bottom:1px solid #339900;



}



div.error{



	background:#FFCCCC;



	border-top:1px solid #FF3366;



	border-bottom:1px solid #FF3366;



}

</style>



<div class="row-fluid" style="margin-bottom:5px;" align="center">

								

								<div class="span12">

									<div class="tabbable tabs_style4">

									<div class="tab-pane" id="shop-tab3" style="padding: 10px 15px 15px;">

												<hr>

												<!--<div class="fb-comments" data-href="http://www.impressline.com.mx/detalle.php?id_categoria=1&id=5" data-num-posts="5" data-width="875"></div>-->

												<? if(isset($estatus) && $estatus == "OK"){ ?>



	<div id="msgContainer" class="saved">Se ha guardado correctamente la 



informaci&oacute;n. <a href="cotizacion.php" onClick="actualizarLista();">Ver lista 



Actualizada.</a></div>



	<? }



	   if(isset($estatus) && $estatus == "ERROR"){	?>



	<div id="msgContainer" class="error"><?php echo $m;?></div>



	<? } ?>



	<? if(!isset($estatus)){ ?><div>&nbsp;</div><? } ?> 

											<form  method="post" action="" name="form" id="form">

                                            <input type="hidden" id="opc" name="opc" value="" />

															<input type="hidden" value="articulos/<?php echo $imagen;?>" name="action" />

															<input type="hidden" value="<?php echo $nombre;?>" name="nombre_articulo" />

															<input type="hidden" value="<?php echo $codigo;?>" name="codigo_articulo" />

													<h2 class="title-step" style="text-align: center;">REGISTRO</h2>

													<table>

													<tr>

														<td><strong>Nombres:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Apellidos:</strong>

														<br/><input type="text" name="nombre" id="nombre" placeholder="Juan Antonio" value="" required><input type="text"  name="apellido" id="apellido" placeholder="Gonzalez Perez" value="" required></td>

													</tr>

													

													<tr>

														<td><strong>Correo electrónico:</strong><br/> <input type="text"  name="email" id="email" value="" placeholder="PJ: ejemplo@abc.com" style="width: 500px !important" required></td>

													</tr>

													<tr>

														<td><strong>Confirma tu correo electrónico:</strong><br/> <input type="text"  name="email2" id="email2" value="" placeholder="PJ: ejemplo@abc.com" style="width: 500px !important" required></td>

													</tr>

													<tr>

													

											<td><strong>Clave </strong><br/><input type="password"  name="pass" placeholder="*******" value="" id="pass" style="width: 500px !important" required><br/>

											<small>6 caracteres como minimo, distingue entre mayúsculas y minúsculas.</small> </td>

											</tr>

											<tr>

													

											<td><strong>Confirma tu clave </strong><br/><input type="password"  name="pass2" placeholder="*******" id="pass2" value="" style="width: 500px !important" required><br/>

											</tr>

                                                <tr>

										<td>

											<strong>Empresa</strong><br/> <input type="text"  name="empresa"  id="empresa" value="" placeholder="Empresa" style="width: 500px !important" required></td>



											</tr>

										<tr>

										<td>

											<strong>Telefono y/o Celular</strong><br/> <input type="text"  name="telefono"  id="telefono" value="" placeholder="999-123-1232" style="width: 500px !important"></td>

                                            



											</tr>

                                            <tr>

                                            <td><small><input type="checkbox" name="publicar" checked> Quiero recibir información sobre nuevos productos y promociones</small></td>

											

											</table>

													<br>

                                                    

													<button class="btn btn-flat" id="btnSubmit" type="submit" >Enviar</button>

												</form>

											</div>

										</div>

									</div>

								</div>

<?footer();

?>