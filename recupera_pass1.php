<?php
include_once("lib/conexion.php");
 $usuario=$_POST['nombre'];
	$link=conectarse_servicios();
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
                  $pass2=$row['pass2'];
                }
              }
$mensaje.= "<strong>Nombre Completo: </strong>".$nombre." ".$apellidos."<br/>";
$mensaje.="<strong>Usuario: <strong>".$email."<br/>";
$mensaje.="<strong>Contraseña: </strong>".$pass2."<br/>";
//Librerías para el envío de mail
include_once('lib/PHPMailer/class.phpmailer.php');
include_once('lib/PHPMailer/class.smtp.php');

//Este bloque es importante
$para=$_POST['nombre'];
$correo = new PHPMailer();
 
$correo->IsSMTP();
 
//$correo->SMTPAuth = true;
 
//$correo->SMTPSecure = 'tls';
 
$correo->Host = "localhost";
 
//$correo->Port = 25;

$correo->Charset = "UTF-8";
$correo->AddAddress($para);
$correo->Subject = "Recuperación de Contraseña";

$correo->Body = $mensaje;
//Para adjuntar archivo
//$mail->AddAttachment($archivo, $archivo);
$correo->MsgHTML($mensaje);
  
//Avisar si fue enviado o no y dirigir al index
if($correo->Send())
{
    
    echo'<script type="text/javascript">
            alert("Enviado Correctamente");            
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
         </script>';
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="css/owl.theme.css" rel="stylesheet">
    <style type="text/css">
.iosSlider {
    width: 100%;
    background: url(loader_dark.gif) no-repeat center center;
    height: 370px !important; 

    .img-rounded2 {
  border-radius: 50px;
}
   .img-rounded3 {
  border-radius: 10px;
}
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
                                    <h3>En breve recibirá un email con su contraseña.</h3>
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
	<a href="#" id="totop" class="off">TOP</a>

<script src="js/jquery.iosslider.min.js"></script>
<script src="js/jquery.iosslider.kalypso.js"></script>
<script type="text/javascript">
;(function($){
	$(document).ready(function() {

		$('.iosSlider').iosSlider({
			onSlideChange: slideChange,
            autoSlideTimer: 10000,
			autoSlide: true
		});
	
	}); // end doc ready
})(jQuery);
</script>


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


<script type="text/javascript" src="js/bootstrap.min.js"></script><!-- Bootstrap Framework -->
<script type="text/javascript" src="js/plugins.js"></script><!-- jQuery Plugins -->
<script type="text/javascript" src="js/superfish_menu.js"></script><!-- Superfish Menu -->
<script type="text/javascript" src="js/twitter.min.js"></script><!-- twitter script -->

<script type="text/javascript" src="js/kalypso_script.js"></script>



<script type="text/javascript" src="js/conversion.js">
</script>

<script type="text/javascript" src="js/functions.js"></script>

</body></html>
