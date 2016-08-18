

<?php

error_reporting(0);



	require_once 'lib/login.action.php';



	$membership = new loginActions();



	$membership->confirm_Member2(); 



	include_once("lib/template.php");

	include_once("lib/files.admin.php");



  //include_once("lib/util.php");



	//include_once("lib/sql.injection.php");



	include_once("lib/sanitize/sanitize.php");

	

	$link=conectarse();



	if($_POST){
	$ruta_files='docs/';

	$target_path = "docs/";

    $target_path = $target_path . basename( $_FILES['filefoto']['name']); 

$target_path = "docs/";

$target_path = $target_path . basename( $_FILES['filefoto']['name']); 

if(move_uploaded_file($_FILES['filefoto']['tmp_name'], $target_path)) 

{ 

$estatus="OK";

}else{

$estatus="ERROR";

} 

}

cabezal(); ?>

<script language="javascript" src="js/datevalid.js" type="text/javascript"></script>



<script language="javascript" src="js/jquery-1.2.6.min.js" type="text/javascript"></script>



<script language="javascript">



function confirmar ( mensaje ) { 

return confirm( mensaje ); 

} 



function admRegistroupd() { 

   extensiones_permitidas = new Array(".pdf"); 

   mierror = "";



	var msgError = "";



	if($("#titulo").val() == ''){



		msgError = msgError + "- Titulo .\n";



	}



	if($("#descripcion").val() == ''){



		msgError = msgError + "- Descripcion.\n";



	}

	

	if($("#departamento").val() == ''){



		msgError = msgError + "- Departamento.\n";



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



	var dt=$("#cbmes").val()+"/"+$("#cbdia").val()+"/"+$("#cbanio").val();



	if (isDate(dt)==false){



		msgError = msgError + "- Fecha no válida.\n";



	}



	if(msgError != ""){



		alert("Por favor, escriba información en los siguientes campos:\n"+msgError);



		return false;



	}



	$("#opc").val("SAVE");



	$("#form").submit();



}



function admRegistro(archivo) { 

   extensiones_permitidas = new Array(".pdf",".docx",".pptx",".ppsx",".xlsx",".doc",".ppt",".pps",".xlx",".jpg",".png",".gif");

   mierror = "";



	var msgError = "";



	



		if($("#filefoto").val() == ''){



			msgError = msgError + "- Archivo .\n";



		}
	/*if($("#piefoto").val() == ''){



		msgError = msgError + "- Pie de Foto.\n";



	}*/



	// para validar la fecha mm/dd/yyyy
	if(msgError != ""){



		alert("Por favor, escriba información en los siguientes campos:\n"+msgError);



		return false;

	}

	if (!archivo) { 

      //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 

      	mierror = "No has seleccionado ningún archivo"; 

   }else{ 

      //recupero la extensión de este nombre de archivo 

      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 

      //alert (extension); 

      //compruebo si la extensión está entre las permitidas 

      permitida = false; 

      for (var i = 0; i < extensiones_permitidas.length; i++) { 

         if (extensiones_permitidas[i] == extension) { 

         permitida = true; 

         break; 

         } 

      } 

      if (!permitida) { 

         mierror = "Comprueba la extension de los archivos a subir. \nSolo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 

      	}else{ 

         	 //submito! 

         alert ("Todo correcto...guardando  la informacion"); 

        $("#opc").val("SAVE");



	    $("#form").submit();

         return 1; 

      	} 

   } 

   //si estoy aqui es que no se ha podido submitir 

   alert (mierror); 

   return 0; 
}





function actualizarLista(){



	var array_data = new Array();



	array_data[0] = $("#idRow").val();



	array_data[1] = $("#id").val();



	array_data[2] = '<? echo $titulo; ?>';

	

	array_data[3] = '<? echo $departamento; ?>';



	array_data[4] = '<? if ($publicar=='S'){echo 'publicado.gif';} else{echo 'no_publicado.gif';} ?>';

	array_data[5] = 'delete.gif';



	parent.parent.refreshNoticia(array_data);



}

function ocultaMensaje(){



	try{



		//$('#msgContainer').css('display','none');



		$('#msgContainer').html('&nbsp;');



		$('#msgContainer').attr('className','');



	}



	catch(error){



	}



}



$(document).ready(function(){



	$('input[type="text"]').change(ocultaMensaje);



	$('select').change(ocultaMensaje);



	$('input[type="checkbox"]').click(ocultaMensaje);



});



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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
        	$(document).ready(function(){
				$("#frmArchivo").submit(function(){
      				     				
      				var datos = new FormData();
      				datos.append('archivo',$('#archivo')[0].files[0]);
									
      				$.ajax({
      					type:"post",
      					dataType:"json",
      					url:"importar_articulos.php",      					
      					contentType:false,
						data:datos,
						processData:false,
						cache:false
      				}).done(function(respuesta){      					
      					alert(respuesta.mensaje);      					
      				});
      				return false;
      			});
      		});

      		$(document).ready(function(){
				$("#frmprecios").submit(function(){
      				     				
      				var datos = new FormData();
      				datos.append('archivo',$('#archivo')[0].files[0]);
									
      				$.ajax({
      					type:"post",
      					dataType:"json",
      					url:"importar_precios.php",      					
      					contentType:false,
						data:datos,
						processData:false,
						cache:false
      				}).done(function(respuesta){      					
      					alert(respuesta.mensaje);      					
      				});
      				return false;
      			});
      		});

      		$(document).ready(function(){
				$("#frmimagen").submit(function(){
      				     				
      				var datos = new FormData();
      				datos.append('archivo',$('#archivo')[0].files[0]);
									
      				$.ajax({
      					type:"post",
      					dataType:"json",
      					url:"importar_imagen.php",      					
      					contentType:false,
						data:datos,
						processData:false,
						cache:false
      				}).done(function(respuesta){      					
      					alert(respuesta.mensaje);      					
      				});
      				return false;
      			});
      		});
        </script>   

<?php body(); ?>



 <div id="page-wrapper" >



        <div class="row">

          <div class="col-lg-8">

            <h1>Panel de Control <small>Administrador</small></h1>

            <ol class="breadcrumb">

            </ol>

           

          </div>

        </div>

        

            <div class="row" >

             <div class="col-lg-8">

            <div class="row">

  	          <div class="col-md-6"><h2>Subir Productos</h2></div>

              </div>
              
             <a href="descargas/formato_subir_articulos.csv"><h2>Descargar Formato para importar articulos </h2></a>
             <h3>Nota: eliminar los titulos, solo los datos como se muestra el ejemplo,en caso de no tener algun dato poner 0</h3>

              <form name='frmArchivo' id="frmArchivo" method="post">       	
  			<label>Archivo:</label>
   			<input type="file" name="archivo" id="archivo" accept=".csv" />
   			<input type="hidden" name="MAX_FILE_SIZE" value="20000" />       			       
   			<input type = "submit" name="enviar" value="Importar"/>       	
      	</form>                

        </div>

        

        </div>

        <div class="row" >

             <div class="col-lg-8">

            <div class="row">

  	          <a href="descargas/formato_subir_precios.csv"><h2>Descargar Formato para importar precios </h2></a>
             <h3>Nota: eliminar los titulos, solo los datos como se muestra el ejemplo,en caso de no tener algun dato poner 0</h3>


              </div>

               <form name='frmprecios' id="frmprecios" method="post">       	
  			<label>Archivo:</label>
   			<input type="file" name="archivo" id="archivo" accept=".csv" />
   			<input type="hidden" name="MAX_FILE_SIZE" value="20000" />       			       
   			<input type = "submit" name="enviar" value="Importar"/>       	
      	</form>                               

        </div>

        

        </div>

         <div class="row" >

             <div class="col-lg-8">

            <div class="row">

  	           <a href="descargas/formato_subir_imagenes.csv"><h2>Descargar Formato para importar imagenes de los articulos </h2></a>
             <h3>Nota: eliminar los titulos, solo los datos como se muestra el ejemplo,en caso de no tener algun dato poner 0</h3>

              </div>

               <form name='frmimagen' id="frmimagen" method="post">       	
  			<label>Archivo:</label>
   			<input type="file" name="archivo" id="archivo" accept=".csv" />
   			<input type="hidden" name="MAX_FILE_SIZE" value="20000" />       			       
   			<input type = "submit" name="enviar" value="Importar"/>       	
      	</form>                               

        </div>

        

        </div>

        </div>

              

    

<?php footer(); ?>

    