<?php
session_start();
	include_once("lib/conexion.php");

	require_once('lib/login.action.php');

	$membership = new loginActions();
  
	$membership->confirm_Member2();

  $user = $_SESSION['admin_user'];
  $permiso = $_SESSION['permiso'];


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

function cabezal() { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sartory | Promocionales - Administración</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="lib/morris-0.4.3.min.css">

    <style>
	.side-nav {
top: 100px;
}
#page-wrapper {
padding: 40px 25px;
}
body{
 font-family: 'Roboto Condensed', sans-serif;
}
	</style>
    
		<script type="text/javascript" src="js/funciones.admin.js"></script>

		<script type="text/javascript">var GB_ROOT_DIR = "lib/greybox/";</script>

		<script type="text/javascript" src="lib/greybox/AJS.js"></script>

		<script type="text/javascript" src="lib/greybox/AJS_fx.js"></script>

		<script type="text/javascript" src="lib/greybox/gb_scripts.js"></script>

		<link href="lib/960/960.css" type="text/css" rel="stylesheet" media="all" />
        

		

		<link href="lib/greybox/gb_styles.css" rel="stylesheet" type="text/css" />

      <link href="css/rounded_borders.css" rel="stylesheet" type="text/css"> 

		
        

		<!--[if !IE]>-->  

	<link rel="shortcut icon" href="../img/favicon.png">	
  </head>
<?php } ?>
<?php
function body(){ ?>
  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="brand" href="http://www.sartory.mx" align="center" target="_blank" data-toggle="collapse" data-target=".nav-collapse">
                  <img src="img/SARTORYlogo3.png" width="320px">
                  
            </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <?php 
            if($_SESSION['permiso'] == 1){?>
            <li><a href="filtro_articulos.php"><i class="fa fa-bookmark"></i> Artículos</a></li>
            <li><a href="filtro_banners.php"><i class="fa fa-picture-o"></i> Banners</a></li>
            <li><a href="filtro_categorias.php"><i class="fa fa-outdent"></i> Categorías</a></li>
            <li><a href="filtro_proveedores.php"><i class="fa fa-book"></i> Proveedores</a></li>
            <li><a href="admin.subir.archivo.php"><i class="fa fa-file-o"></i> Archivos</a></li>
            <li><a href="filtro_personalizacion.php"><i class="fa fa-exchange"></i> Personalización</a></li>
            <li><a href="filtro_tag.php"><i class="fa fa-tags"></i> Tags</a></li>
            <li><a href="filtro_eliminalizacion.php"><i class="fa fa-exchange"></i> Eliminalización</a></li>
            <li><a href="filtro_cotizacion.php"><i class="fa fa-exchange"></i> Cotizaciones</a></li>
            <li><a href="filtro_precios.php"><i class="fa fa-exchange"></i> Listas de Precios</a></li>
            <li><a href="usuarios.php"><i class="fa fa-user"></i> Usuarios</a></li>
            <?php } 
            if($_SESSION['permiso'] == 2){?>
            <li><a href="filtro_articulos2.php"><i class="fa fa-bookmark"></i> Artículos</a></li>
            <li><a href="filtro_banners2.php"><i class="fa fa-picture-o"></i> Banners</a></li>
            <li><a href="filtro_categorias2.php"><i class="fa fa-outdent"></i> Categorías</a></li>
            <li><a href="filtro_proveedores2.php"><i class="fa fa-book"></i> Proveedores</a></li>
            <li><a href="filtro_cotizacion2.php"><i class="fa fa-exchange"></i> Cotizaciones</a></li>
            <?php } ?>
            <li><a href="#" onclick="document.frmlogout.submit();"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
           
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['admin_user'];?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                <li><a href="#" onclick="document.frmlogout.submit();"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <!-- /.row -->
<?php } ?>
        <!-- /.row 

        --> 
      
<?php
function footer(){ ?>
<!--Contenido -->
<form name="frmlogout" id="frmlogout" action="user.login.php" method="post"><input type="hidden" name="status2" id="status2" value="loggedout" /></form>

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
<?php } ?>