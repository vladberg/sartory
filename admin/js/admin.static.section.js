// JavaScript Document
function updSeccion(){
	var msgError = "";
	
	if($("#nombre_seccion").val() == ''){
		msgError = msgError + "Escriba el nombre de la secci�n.\n";
	}
	if($("#id_seccion").val() == ''){
		msgError = msgError + "El identificador de la secci�n no existe.\n";
	}
	if(msgError != ""){
		alert(msgError);
		return false;
	}
	var $tmp = Base64.encode( tinyMCE.get('txtcontenido').getContent());
	
	$("#txtcontenido").remove();
	$("#contenido_oculto").val($tmp);
	$("#formseccion").submit();
}