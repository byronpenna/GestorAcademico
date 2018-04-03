function eventoChangeCbAnio(){
	var frm = {
		idAnio: $(".cbAnio").val()
	}
	llenarSeccion(frm);
}
function iniciales(){
	eventoChangeCbAnio();
}

function cargarTablaInscritos(frm){
	var url = $(".txtHdInscripcionSeccion").val();
	var peticion = new PeticionAjax(url,frm,"POST");
	console.log("Frm es ",frm);
	peticion.peticion(function(data){
		console.log("La data es: ",data);
		console.log("La url es: ",url);
		var obj = jQuery.parseJSON(data);
		console.log(obj);
		if(obj.estado){

		}
	})
}
function llenarSeccion(frm){
	var url = $(".txtHdObtenerSeccion").val();
	var peticion = new PeticionAjax(url,frm,"POST");
	peticion.peticion(function(data){
		console.log("La data es: ",data);
		console.log("La url es: ",url);
		var obj = jQuery.parseJSON(data);
		console.log(obj);
		if(obj.estado){
			var opciones ="";
			$.each(obj.secciones,function(i,seccion){
				opciones += "<option value='"+seccion._idSeccion+"'>"+seccion._seccion+"</option>";

			})
			$(".cbSeccion").empty().append(opciones);

		}
		
	})	
}