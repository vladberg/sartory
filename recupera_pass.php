<?php
include_once("lib/template.php");
  

?>
<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.ico">

    <title>Sartory</title>

    <!-- Bootstrap core CSS -->
    <link href="css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/css/signin.css" rel="stylesheet">
     <script type="text/javascript" src="js/md5.js"></script>
    <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
    <script type="text/javascript" src="js/funciones.admin.js"></script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css">
  .avatar{
    width: 150px;
    margin: 10px auto 30px;
    border-radius: 100%;
    border: 2px solid #458F06;
    background-size: cover;
  
}
.col-lg-4 {
top: 100px;
float: none;
}
.row {
margin-right: -500px;
margin-left: 350px;
}
#wrapper {
padding-right: 225px;

}
.style1{
      color:#FF0000;
      font-weight:bold;
}

.style2 {
      color: #FFFFFF;
      font-weight: bold;
}
#tbCaptcha{
      border:1px solid #CCCCCC;
}
body {
padding-top: 150px;
padding-bottom: 40px;
background-color: #eee;
}
  </style><style type="text/css"></style></head>

  <body>

     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          
           <a class="brand" href="http://www.sartory.mx" align="center" data-toggle="collapse" data-target=".nav-collapse">
                  <img src="img/SARTORYlogo23.png" width="320px">
                  
          </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        
        <!-- /.navbar-collapse -->
      </nav>
    <div class="container">
    <div class="panel panel-success" style="border: 1px solid #458F06;">
    
      <form class="form-signin" role="form" name="frmregistro" id="frmregistro" method="post" action="recupera_pass1.php">
      
      
        <h2 class="form-signin-heading" align="center">RECUPERAR CLAVE</h2>
        <label><input size="35" name="nombre" type="text" id="nombre" class="form-control" placeholder="Correo Electronico" required autofocus></label> 
        <button type="submit" class="btn btn-lg btn-info btn-block" name="guardar" value="Ingresar">Recuperar</button><br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="padding-left:55px">¿No tienes una cuenta? </strong><br/>
                   <a href="registro.php"  ><button type="button" class="btn btn-lg btn-danger btn-block" name="guardar"  value="Ingresar">Regístrate</button></a>
          
      </form>
      <br /><br /><br />
    </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  

</body></html>