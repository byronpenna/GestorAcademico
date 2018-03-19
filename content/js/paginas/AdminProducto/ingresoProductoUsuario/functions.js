function cargarEdicion(){
	
}
function fillPresentacion(frm){
	var url = $(".txtHdGetPresentaciones").val();
	console.log(url);
	var peticion = new PeticionAjax(url,frm,"POST");
	peticion.peticion(function(data){
		var obj = jQuery.parseJSON(data);
		var opciones ="";
		if(obj.estado){
			console.log("D:");
			$.each(obj.presentaciones,function(i,presentacion){
				opciones += "<option value='"+presentacion._idPresentacion+"'>"+presentacion._descripcion+" - "+presentacion._pesoNeto+"g </option>";
			})
			$(".cbPresentacion").empty().append(opciones);
			console.log("D:");
		}
		console.log("La respuesta es: ",obj);
	})
}

function editMode(tr,estado){
	if (estado){
		tr.find(".divNormal").addClass("hidden");
		tr.find(".divEdit").removeClass("hidden");
	}else{
		tr.find(".divEdit").addClass("hidden");
		tr.find(".divNormal").removeClass("hidden");
	}
}
function EliminarProducto(frm,callback){
	var url = $(".txtHdUrlEliminar").val();
	//console.log(frm);
	console.log(url);
	var peticion = new PeticionAjax(url,frm,"POST");
	peticion.peticion(function(data){
		var obj = jQuery.parseJSON(data);
		callback(obj);
	});
}