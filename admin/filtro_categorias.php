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

    if (confirm('¿Está seguro de querer eliminar esta categoria?')){ 

       document.v.submit() 

    } 

} 

function confirmar ( mensaje ) { 

return confirm( mensaje ); 

} 

</script>

<?	



   body();?>

   <div id="page-wrapper">



        <div class="row">

          <div class="col-lg-10">

            <h2 style="color:#FE0000;text-align: center;">ADMINISTRADOR DE CATEGORIAS</h2>

          </div>

        </div>







		<div class="row">

          <div class="col-lg-10">

            <div class="row">

  	          <div class="col-md-6"><h1>Categorias</h1></div>

              <div class="col-md-6" align="right"><h2><a href="admin.si.categorias.php?opc=ADD&id=0" class="btn btn-success">Agregar Categoria</a></h2></div>

            </div>

            <div class="table-responsive">

              <table class="table table-bordered table-hover table-striped tablesorter">

                <thead>

                  <tr>

                  	<th></th>

                    <th>Categoria</th>

                    

                    <th>Publicado</th>

                    <th></th>

                    <th></th>

                  </tr>

                </thead>

                <tbody>

                <?

							$link=conectarse_servicios();

							$query="SELECT * FROM categorias order by orden asc;";

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

									



									if($row['estatus']==1){



										$imagen='publicado.gif';



									}

									if($imagen=='no_publicado.gif'){

										$class='danger';

									}



								?>

                  <form action="agregar_orden.php" method="post">

                  <input type="hidden" name="idcat[]" value="<?php echo $row['id_categoria'];?>">

                  <tr class="<?php echo $class; ?>" id="row<? echo $icont; ?>">

                    <td><a href="admin.si.categorias.php?<? echo "id=".$row['id_categoria']."&opc=UPD"; ?>&rowId=row<? echo $icont; ?>"><img src="img/editar.gif" border="0"/><? echo $row['orden']; ?></a></td>

                    <td><a href="<img src="../categorias/<?php echo $row['imagen']?>" border="0" /><? echo html_entity_decode($row['categoria'], ENT_QUOTES); ?></a></td>

                    <!--<td><img src="../categorias/<?php echo $row['imagen']?>" border="0" /></td>-->

                    <td><img src="img/<? echo $imagen; ?>" border="0" /></td>

                    <td><input  type="number" min="00" max="9999" name="orden[]" value="<?php echo $row['orden'];?>" style="width: 45px !important" size="5"></td>

                    <td><a href="eliminar_categoria.php?id=<?php echo $row['id_categoria']; ?>" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><img src="img/delete.gif" border="0"  title="Eliminar Seccion"  style="cursor:pointer;"  /></a></td>

                  </tr>

                  <? }



							}



							?>

							<td><button type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Guardar">Actualizar Orden</button></td>

							</form>

                            

                </tbody>

              </table>

              <? if(mysql_num_rows($resultado) <= 0){?>

         <h1 style="text-align:center;" class="danger">No hay Categorias capturadas por el momento</h1>

         <?php }?>

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