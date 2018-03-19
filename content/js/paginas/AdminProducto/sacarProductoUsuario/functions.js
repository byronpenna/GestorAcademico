function RefreshTable(tableId, urlData)
{
  
    table = $(tableId).dataTable();
    oSettings = table.fnSettings();

    table.fnClearTable(this);

    for (var i=0; i<json.aaData.length; i++)
    {
      table.oApi._fnAddData(oSettings, json.aaData[i]);
    }

    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
    table.fnDraw();
  
}
function getTrVenta(venta){
	
	var total = venta._precioUnitario * venta._cantidad
	
	//console.log("venta a imprimir",venta);
	var tr = "\
	<tr>\
		<td class='hidden'>\
			<input type='hidden' name='txtHdIdVenta' class='txtHdIdVenta' value='"+venta._idVenta+"'>\
		</td>\
		<td>\
			"+venta._idVenta+"\
		</td>\
		<td>\
			"+venta._cliente._nombreComercial+"\
		</td>\
		<td>\
			"+venta._usuario._usuario+"\
		</td>\
		<td>\
			"+venta._presentacion._descripcion+" ( "+venta._presentacion._pesoNeto+"g)\
		</td>\
		<td>\
			"+venta._cantidad+"\
		</td>\
		<td>\
			$"+venta._precioUnitario+"\
		</td>\
		<td>\
			"+venta._fecha+"\
		</td>\
		<td>\
			"+venta._tipoFactura._tipoFactura+"\
		</td>\
		<td>\
			$"+total+"\
		</td>\
		<td>\
			<button class='btn btn-danger btnEliminarVenta'>\
				Eliminar\
			</button>\
		</td>\
	</tr>\
	";
	return tr;
}
// funciones
function EliminarProducto(frm,callback){
	var url = $(".txtHdUrlEliminar").val();
	console.log("url a eliminar",url);
	console.log("frm a enviar",frm);
	var peticion = new PeticionAjax(url,frm,"POST");
	peticion.peticion(function(data){
		callback(data);
	})	
}
function getVentasByDates(frm,callback){
	var url = $(".txtHdUrlgetVentasByDate").val();
	console.log("url a eliminar",url);
	console.log("frm a enviar",frm);
	var peticion = new PeticionAjax(url,frm,"POST");
	peticion.peticion(function(data){
		callback(data);
	})
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