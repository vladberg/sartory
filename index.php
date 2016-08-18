<?php

session_start();

include_once ("lib/template.php"); 

$link=conectarse();



if(isset($_SESSION['servicios_user'])){

$usuario=$_SESSION['servicios_user'];

$log='<a href="#" onclick="document.frmlogout.submit();" style="color:#FE0000"><i class="fa fa-power-off"></i> Cerrar Sesión</a>';

}

else{

$usuario='<a href="user.login.php" style="color:#69AE1D">

        				<i class="fa fa-user"> INICIAR SESION </i>

					</a>';

$log='<a href="registro.php" style="color:#69AE1D">

    					<i class="fa fa-user"> REGISTRO </i>

					</a>';

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

	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/template.css" type="text/css">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/responsive.css" type="text/css">

'<script src="js/jquery-1.8.2.min.js"></script>

    <style type="text/css">

.iosSlider {

    width: 100%;

    background: url(loader_dark.gif) no-repeat center center;

    height: 370px !important; }

    #ber { 

  font: 100% sans-serif !important; 

}



    </style>


	<link rel="stylesheet" href="css/style.css" type="text/css">

	





</head>



<body class="">





	<div id="page_wrapper">

<link rel="stylesheet" href="css/site2.css" type="text/css">

<style>

.t-title.light {

    color: #FFFFFF;

    font-size: 28px;

    margin: 15px 0 0;

    FONT-WEIGHT: 200;

    TEXT-ALIGN: CENTER;

}

.content-about-us {

    background-color: #0B0146;

    color: #FFFFFF;

    padding-bottom: 10px;

}

</style>

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

						<a href="http://sartory.mx/">

							<img src="img/SARTORYlogo3.jpg" alt="Sartory">

							

						</a>

					</h1>

				</div>

				<div class="span9">

					<ul class="top-menu">

					<li class="with-margin"><a href="index.php"><h3 >INICIO</h3></a></li>
                    <li class="with-margin2" style="color: #ED1C24"> | </li>

                    <li class="with-margin"><a href="registro.php"><h3>REGISTRATE</h3></a></li>

                    <li class="with-margin2" style="color: #ED1C24"> | </li>


						<li class="with-margin"><a href="cotizacion.php"><img src="img/cotiza.jpg" alt="Cotizaciónes"></a></li>

						<li class="with-margin2" style="color: #ED1C24"> | </li>


						<li>

							<div class="search-content">

								<form action="busqueda.php" method="post">

									<input name="buscar" maxlength="50" type="text" size="20" placeholder="¿Qué estás buscando?" >

									<button type="submit" title="Buscar">

										<img src="img/lupa-busqueda.png" alt="Buscar">

									</button>

								</form>

							</div>

						</li>

						<li class="with-margin2" style="color: #ED1C24"> | </li>


						<li class="with-margin">

							<a href="contacto.php">

								<ul class="inline">

									<li>

										<img src="img/ico-contacto.png" alt="Contacto">

									</li>

									<li>

										Contáctanos

										<small>Estamos para ayudarte</small>

									</li>

								</ul>

								

								

							</a>

						</li>

						

						

						

					</ul>

				</div>

			</div>

			</div>

</header>

<?php slider(); ?>
<?
						$query="select id_mensaje,bienvenida from mensaje";
			$resultado=mysql_query($query, $link);
			while($row=mysql_fetch_array($resultado)){ 
				$bienvenida=$row[1];

				}?>
			 <div class="content-about-us">
    		<div class="container">
				<div class="row-fluid">
					<div class="span12">
						<h1 class="t-title light text-left"><?php echo $bienvenida;?></h1>						
						<p>
						
						</p>

					</div>

				</div>

			</div>

		</div>

	<div class="container">

			<div class="row-fluid" >

            

				<div class="span12">

					<div class="breadcrumb" style="text-aling:center">

						Escoge una categoría:

					</div>

				</div>

			</div>



			<div class="row-fluid">

			<?php 

			$hora=$_GET['h'];

			$fecha =$_GET['f'];

			$us=$_GET['us'];

			$query="select id_categoria,categoria,imagen from categorias where estatus=1 order by orden asc";

			$resultado=mysql_query($query, $link);

			while($row=mysql_fetch_array($resultado)){ 

      $id_categoria=$row[0];

      $nombre_categoria=$row[1];

      $archivo=$row[2];



			?>



	<div class="span70">

					<table class="s-square">

						<tbody><tr>

							<td>

								<a href="articulos.php?id=<?php echo $id_categoria;?>&h=<?php echo $hora;?>&f=<?php echo $fecha;?>&us=<?php echo $us;?>">

									<img src="categorias/<?php echo $archivo; ?>" alt="Boligrafos">

								</a>

							</td>

						

							

					</tbody></table>



				</div>

				    <?php

        }

        ?>

								<div class="o-line strong"></div>

			</div>

			



				

			</div>

		</div>

		

		<div class="content-about-us">

			<div class="container">

				<div class="row-fluid">

					<div class="span12">

						<h1 class="t-title light text-left">Sartory | Promocionales</h1>
<?
						$query="select id_mensaje,pie from mensaje";
			$resultado=mysql_query($query, $link);
			while($row=mysql_fetch_array($resultado)){ 
				$pie=$row[1];

				}?>
						<p style="text-align: center">
							<?php echo $pie;?>
						</p>
								</div>

				</div>

			</div>

		</div>

		 <script src="js/bootstrap.min.js"></script>

<?php

footer();

?>