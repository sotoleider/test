$(document).ready(function() {
	// Obtener municipios
	$("#departamento-id").change(function(){ 
	  var departamento = $("#departamento-id option:selected").val();
	  $("#capa-municipio").css("display","");
	 if(departamento!=""){
		$.ajax({
		  type: "POST",
		  url: ruta+"/municipios/"+departamento,
		  dataType: "html",
		  headers: {
			'X-CSRF-Token': $("#csrfToken").val()
		  }
		  }).done(function(data){ 
			  $("#municipio_id").html(data);
		  });
	 }
	  
	});
	
	
	//variables
	var pass1 = $('[id=contrasena]');
	var pass2 = $('[id=contrasena_comf]');
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span></span>').insertAfter(pass2);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	   span.text(negacion).addClass('negacion');	
	}
	if(valor1.length==0 || valor1==""){
	   span.text(vacio).addClass('negacion');	
	}
	if(valor1.length<6 && valor1.length<10){
	   span.text(longitud).addClass('negacion');
	}
	if((valor1.length!=0 && valor1==valor2) && (valor1.length>=6 && valor1.length<=10) ){
	   span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
	   $('.usuarios button').attr("disabled", false);
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	$('.usuarios button').attr("disabled", true);
	coincidePassword();
	});
	pass1.keyup(function(){ 
	$('.usuarios button').attr("disabled", true);
	coincidePassword();
	});

});