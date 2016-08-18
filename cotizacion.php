<?php
include_once("lib/template.php");
require_once('lib/login.action.php');

	$membership = new loginAction();
  
	$membership->confirm_Member();
	$link=conectarse();
	if($_POST){

		$unidad=$_POST['unidad'];
		$tipo=$_POST['tipo'];
		$color=$_POST['color'];
		$id=$_POST['id'];
		if($tipo!=''){
			$tranx="update cotizacion set personalizado=".$tipo." where idcotizacion=".$id.";";					
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);
		}

		if($color!=''){
			$tranx="update cotizacion set color='".$color."'  where idcotizacion=".$id.";";					
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);}

if($unidad!=''){$tranx="update cotizacion set unidad=". $unidad."  where idcotizacion=".$id.";";					
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);}

	if($unidad!='' && $color!='' && $tipo!=''){
	$tranx="update cotizacion set unidad=". $unidad.",personalizado=".$tipo.",color='".$color."' where idcotizacion=".$id.";";					
   $rtranx=mysql_query($tranx, $link);
$idreg = mysql_insert_id($link);}	
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

cabezal();
?>
<style type="text/css">
	select {
    width: 65px;
    border: 1px solid #cccccc;
    background-color: #ffffff;
}
.btn-flat2 {
    background: #0B0146;
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 1px 0 rgba(0,0,0,.8);
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    position: relative;
    border: 0;
    }
</style>

<div class="row-fluid" style="margin-bottom:5px;">
								
								<div class="span12">
									<div class="tabbable tabs_style4">
									<div class="tab-pane" id="shop-tab3" style="padding: 10px 15px 15px;">
												<hr>
												<h2 class="title-step" style="text-align: center;">Solicitud de Cotización</h2>
												<!--<div class="fb-comments" data-href="http://www.impressline.com.mx/detalle.php?id_categoria=1&id=5" data-num-posts="5" data-width="875"></div>-->
											<div class="table-responsive">
											
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                  	<th></th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Unidades</th>
                    <th>Precio</th>
                    <th>Perzonalizado</th>
                    <th>Color y/o Comentarios</th>
                    <th>Estatus</th>
                    <th>Fecha de Captura</th>
                    <td><u><a href="elimina_todo.php?id=<?php echo $_SESSION['servicios_user'];?>">Eliminar todos</a></u></td>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?
							$link=conectarse_servicios();
							$usuario=$_SESSION['servicios_user'];
							$query="Select * from cotizacion where usuario='$usuario' and estatus=0 and fecha=CURDATE();";
							$resultado=mysql_query($query, $link);
							//echo $resultado;

							$icont=0;
							$class='success';
						
							if(mysql_num_rows($resultado)>0){

								while($row = mysql_fetch_array($resultado)){ 
									$tipo=html_entity_decode($row['persona'], ENT_QUOTES);
									$idss=$row['id_articulo'];
                                    $idcot=$row['idcotizacion'];

									$icont++;
									if($class=='success'){
								$class='active';
								}else{
									$class='success';
								}

									$laclase=($icont%2==0?"fila_par":"fila_impar");

									$imagen='no_publicado.gif';
									

									if($row['estatus']==0){

										$imagen='publicado.gif';
										$tip="Capturado ";

									}
									if($row['estatus'] == 2){
										$imagen='publicado.gif';
										$tip='Enviado ';
									}

									if($row['estatus'] == 1){
										$imagen='publicado.gif';
										$tip="Pendiente Enviar ";
									}


									
									if($imagen=='no_publicado.gif'){
										$class='danger';

										
									}

								?>
                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">
                  <form method="post" action="">
                  <input type="hidden" name="id" value="<?php echo $row['idcotizacion'];?>">
                    <td><? echo $icont; ?></td>
                    <td><? echo html_entity_decode($row['codigo'], ENT_QUOTES); ?></td>
                    <td><u><a href="detalle.php?id=<?php echo $row['id_articulo'];?>" target="_blank"><?php echo html_entity_decode($row['nombre'], ENT_QUOTES); ?></a></u></td>
                    <td><input type="text" name="unidad" value="<?php echo $row['unidad'];?>" style="width: 25px !important"></td>
											<td><input type="text" name="unidad" value="<?php echo ROUND($row['precio_venta'],2);?>" style="width: 25px !important"></td>
                                            <td><?php echo $tipo;?></td>
											<td><input type="text" name="color" value="<?php echo $row['color'];?>" /></td>
											<td><?php echo $tip;?><img src="img/<?php echo $imagen;?>"></td>
											<td><?php echo $row['fecha'];?></td>
											<td><a href="eliminar_coti.php?id=<?php echo $row[0]; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Articulo"  style=" :pointer;"  /></a></td>
											<td><input type="submit" value="Actualizar"></td></form>
                  </tr>
                  <? }

							}

							?>
                            
                </tbody>
              </table>
              <? if(mysql_num_rows($resultado) <= 0){?>
         <h1 style="text-align:center;" class="danger">No hay Cotizaciones pendientes por el momento ir a <a href="index.php" style="color: #2f96b4;">Inicio</a></h1>
         <?php }?>
            </div>
													
													
                                                   
                                                    <form action="envia_cotizacion.php" method="post">
                                                    <?php
                                                    $query="Select * from cotizacion where usuario='$usuario' and estatus=0 and fecha=CURDATE();";
    						$resultado=mysql_query($query, $link);
							//echo $resultado;

							$icont=0;
							$class='success';
						
							if(mysql_num_rows($resultado)>0){

								while($row = mysql_fetch_array($resultado)){ 
									$tipo=html_entity_decode($row['persona'], ENT_QUOTES);
									$idss=$row['id_articulo'];
                                    $idcot=$row['idcotizacion'];
?>
                                                    <input type="hidden" name="coti[]" value="<?php echo $idcot;?>"/>
                                                    <?     							} } ?>
													<a href="javascript:window.history.go(-1);"><label class="btn btn-flat2">Agregar Producto</label></a>&nbsp;&nbsp;&nbsp;<button class="btn btn-flat" type="submit">Enviar Cotización</button>
												</form> 
											</div>
										</div>
									</div>
								</div>
								
<?footer();
?>