<?php 

error_reporting();

include_once("lib/template.php");

	



	$membership = new loginActions();



	$membership->confirm_Member2();



	



//	include_once("librerias/rutas.php");



	cabezal(); ?>



<style>



.fila_par{



	background-color:#FFFFFF;



}



.fila_impar{



	background-color:#E5E5E5;



}



.new_row{



	background:#FFFFCC;



}



.tabla_encabezado {



	background-color:#D1D1D1;



	color:#000000;



	font-family:'Arial';



	font-size:11px;



	font-weight:bold;



}







#modTitle{



	font-family:Verdana, Arial, Helvetica, sans-serif; 



	font-weight:bold;



}











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

.form-control{

	width:auto;

}



.btn-danger {
    color: #fff;
    background-color: #FE0000;
    border-color: #BD0B06;
}





</style>



<link rel="stylesheet" type="text/css" href="css/rounded_borders.css">





<script language="javascript" src="js/jquery-1.2.6.min.js" type="text/javascript"></script>



<script language="javascript" src="js/get2post.js" type="text/javascript"></script>



<script language="javascript">

function fEliminarSeccion(idseccion){

	if (confirm("¿Está seguro de querer eliminar esta seccion?"))

		$(".InfoBarContent").load("eliminar_doc.php",{t:'del',ids:idseccion, prmsection:2 ,rnd:Math.random()});

}





function pregunta(){ 

    if (confirm('¿Está seguro de querer eliminar este ddepartamento?')){ 

       document.v.submit() 

    } 

} 

function confirmar ( mensaje ) { 

return confirm( mensaje ); 

} 



//<![CDATA[

function marcar_desmarcar(){

var marca = document.getElementById('marcar');

var cb = document.getElementsByName('seleccion[]');

 

for (i=0; i<cb.length; i++){

if(marca.checked == true){

cb[i].checked = true

}else{

cb[i].checked = false;

}

}

 

}

//]]>

</script>

<?	



   body();?>

   <div id="page-wrapper">



        <div class="row">

          <div class="col-lg-10" aling="center">

            <h2  style="color:#FE0000; text-align: center">ADMINISTRADOR DE Precios</h2>

            <br/>

          </div>

        </div>







		<div class="row">

          <div class="col-lg-10">

            <div class="row">

  	          <div class="col-md-6"></div>
            </div>

            <div class="table-responsive">

            <form action="" method="post"> 

             <h2>Buscar Por: </h2>

             <table class="table table-bordered table-hover table-striped tablesorter">

            	<tr>
         <td><strong>Proveedor</strong></td><td><select class="form-control" name="proveedor" id="categoria">

                                     <option value="">Seleccionar Proveedor</option>

   		<?php

		$link=conectarse();

		$p=$_GET['p'];

		$query="SELECT id_proveedor,nombre FROM proveedores where estatus = 1 order by nombre asc";

		

        $resultado=mysql_query($query, $link);



		while($row=mysql_fetch_array($resultado)){



			?>

	     <option  value="<? echo html_entity_decode($row[0], ENT_QUOTES); ?>" <?php if($categoria == $row[0]){ echo 'selected="selected"';} ?> ><?php echo html_entity_decode($row[1], ENT_QUOTES); ?></option>

         <?php } ?>

         </select></td>

         <td><input type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Buscar"></td>

            	</tr>

            </table>

            </form>

             <form action="costos.php" method="post">

              <table class="table table-bordered table-hover table-striped tablesorter">

                <thead>

                  <tr>

                  	<td></td>

                  	<th></th>

                    <th>Codigo</th>

                    <th>Nombre</th>

                    

                    <th>Proveedor</th>

                    <th>Precio de Venta</th>

                    <th>Costo</th>

                    <th>Utilidad %</th>

                    <th>Diferencia</th>

                  </tr>

                </thead>

                <tbody>

                <?

							$link=conectarse_servicios();

							$codigo=$_POST['codigo'];

							$categoria=$_POST['categoria'];
							$proveedor=1;
							
							if($_POST){
								$proveedor=$_POST['proveedor'];

							}
							

							
							$tag=$_POST['etiqueta'];

							$palabra=$_POST['palabra'];

							$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.costos,a.utilidad,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria FROM articulos a, proveedores p,categorias c where a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria and p.id_proveedor = 1 order by a.id_articulo Asc;";

							

							

							if($proveedor != ''){

								$query="SELECT a.id_articulo,a.precio_publicado,a.codigo,a.precio_venta,a.estatus,a.categoria,a.nombre,a.costos,a.utilidad,p.id_proveedor,p.nombre as proveedor,c.id_categoria,c.categoria FROM articulos a, proveedores p,categorias c where a.id_proveedor = $proveedor and a.id_proveedor = p.id_proveedor and a.categoria=c.id_categoria order by a.id_articulo Asc;";

							

							}
							


							

							$resultado=mysql_query($query, $link);

							//echo $resultado;



							$icont=0;

							$class='success';

							

									



							if(mysql_num_rows($resultado)>0){



								while($row = mysql_fetch_array($resultado)){ 



									$icont++;

									if($class=='success'){

								$class='active';

								}else{

									$class='success';

								}



									$laclase=($icont%2==0?"fila_par":"fila_impar");



									$imagen='no_publicado.gif';

									$visible='no_publicado.gif';

									



									if($row['estatus']==1){



										$imagen='publicado.gif';



									}

										if($row['precio_publicado']==1){



										$visible='publicado.gif';



									}

									if($imagen=='no_publicado.gif'){

										$class='danger';

									}



								?>

                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">
                  <input type="hidden" name="proveedores" value="<?php echo $proveedor;?>" />



                  <td><input type="hidden" name="id[]" value="<?php echo $row['id_articulo']; ?>" requerit><?php echo $row['id_articulo']; ?></td>

                    <td><a href="admin.si.articulos.php?<? echo "id=".$row['id_articulo']."&opc=UPD"; ?>&rowId=row<? echo $icont; ?>"><img src="img/editar.gif" border="0"/></a></td>

                    <td><? echo html_entity_decode($row['codigo'], ENT_QUOTES); ?></td>

                    <td><? echo html_entity_decode($row['nombre'], ENT_QUOTES); ?></td>


                    <td><? echo html_entity_decode($row['proveedor'], ENT_QUOTES); ?></td>
                   

                    <? $precio_venta= round($row['precio_venta'], 2); ?>
                    <td><input type="text" name="precio_venta[]" value="<? echo $precio_venta; ?>"/></td>

                    <td><input type="text" name="costo[]" value="<?php echo $row['costos'];?>" style="width: 80px;" ></td>

                    <td><input type="text" name="utilidad[]" value="<?php echo $row['utilidad'];?>" style="width: 80px;"></td>
                    <?php
                    $pv=round($row['precio_venta'], 2);
                    $cst=$row['costos'];
                    $diferecia=$pv-$cst;
                    ?>

                    <td><input type="text" name="diferecia" value="<?php echo $diferecia;?>" style="width: 80px;"></td>
                    <td><button class="btn btn-flat" type="submit">Calcular</button></td>


                  </tr>

                  <? }



							}



							?>
							<tr><td><button class="btn btn-flat" type="submit">Calcular</button></td></tr>

                            

                </tbody>

              </table></form>

              <? if(mysql_num_rows($resultado) <= 0){?>

         <h1 style="text-align:center;" class="danger">No hay Artículos por el momento</h1>

         <?php }?>
<a href="reporte_precio.php?id=<?php echo $proveedor;?>"><button class="btn btn-flat" type="submit">Exportar Lista de precio</button>
            </div>

          </div>

         </div>

        </div>

                   



					<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>



					<script type="text/javascript" src="js/jquery.flydom-3.1.1.js"></script>



					<script type="text/javascript">



						function refreshNoticia(array_data){



							if(array_data[0] == ""){



								var rows = $("#tbnotificaciones").children().find('tr');



								var numrows = rows.size();



								$("#tbnoticias").createAppend(



									'tr',{id:'row' + String(numrows)},[



										'td',{className:'new_row', align:'center', valign:'middle'},[



											'a',{href:'admin.si.departamentos.php?opc=UPD&id=' + String(array_data[1]) + '&rowId=row' + String(numrows), onclick: 'return GB_showCenter("Departamento - Editar", this.href, 550, 625);'},'<img src="imagen/editar.gif" border="0" />'



										],



													

										'td',{className:'new_row', align:'center'},array_data[2],



										'td',{className:'new_row', align:'center'},array_data[3],



										'td',{className:'new_row', align:'center'},array_data[4],

										'td',{className:'new_row', align:'center', valign:'middle'},'<img src="imagen/' + array_data[5] + '" border="0" />',

										'td',{className:'new_row', align:'center', valign:'middle'},'<img src="imagen/' + array_data[6] + '" border="0" />',

										

										



									]



								);



							}



							else{



								var row = $("#" + String(array_data[0])).children();



								row.get(0).innerHTML = '<a href="admin.si.departamentos.php?opc=UPD&id=' + String(array_data[1]) + '&rowId=' + array_data[0] + '" onclick="return GB_showCenter(\'Departamento - Detalle\', this.href, 550, 625);"><img src="imagen/editar.gif" border="0" /></a>';



								row.get(0).className = 'new_row';



								row.get(1).innerHTML = array_data[2];



								row.get(1).className = 'new_row';



								row.get(2).innerHTML = array_data[3];



								row.get(2).className = 'new_row';

								

								row.get(3).innerHTML = array_data[4];



								row.get(3).className = 'new_row';

								

								row.get(4).innerHTML = '<img src="imagen/'+array_data[5]+'" border="0" />';



								row.get(4).className = 'new_row';

								row.get(5).innerHTML = '<img src="imagen/'+array_data[6]+'" border="0" />';



								row.get(5).className = 'new_row';



							



							}



							GB_hide();



						}

						

						  



					</script>

<?php footer(); ?>