$(document).ready(function(){
	$(".liSacarStock").addClass("active");
	$( ".txtFecha" ).datepicker({ dateFormat: 'yy-mm-dd' });
	
	$( ".txtFechaInicio" ).datepicker({ dateFormat: 'yy-mm-dd' });
	$( ".txtFechaFin" ).datepicker({ dateFormat: 'yy-mm-dd' });
	
	var table = $('.tbSacar').DataTable({
		 "bDestroy": true,
        //"bSort": false,
		 "bAutoWidth": false
	});
	$(".cbCliente").chosen({no_results_text: "Oops, nothing found!"}); 
	$(document).on("click",".btnEliminarVenta",function(e){
		var tr = $(this).parents("tr");
		var frm = {
			idVenta: tr.find(".txtHdIdVenta").val()
		};
		EliminarProducto(frm,function(data){
			//console
			var obj = jQuery.parseJSON(data);
			if (obj.estado){
				console.log(data);
				console.log(obj);
				tr.remove();
			}
		})
	})
	
	$(document).on("submit",".frmBuscarDetalle",function(e){
		e.preventDefault();
		var frm = {
			txtFechaInicio: $(".txtFechaInicio").val(),
			txtFechaFin: $(".txtFechaFin").val(),
			cbUsuario: $(".cbUsuarioBusqueda").val()
		}
		getVentasByDates(frm,function(data){
			//console.log("la respuesta es: ",data);
			var obj = jQuery.parseJSON(data);
			console.log(obj);
			if (obj.estado){
				var tr = "";
				var sum = 0;
				$.each(obj.ventas,function	(key,venta){
					tr += getTrVenta(venta);
					sum += venta._precioUnitario * venta._cantidad;

				})
				$(".spAcumulado").empty().append(sum.toFixed(2));
				var comision = sum*0.1;
				$(".spComision").empty().append(comision.toFixed(2));
				var total = sum-comision;
				$(".spTotalBusqueda").empty().append(total.toFixed(2));
				$(".divTotalesSacar").show();
				table.destroy();
				//$('.tbSacar').empty();
				$(".tbVentas").empty().append(tr);
				table = $('.tbSacar').DataTable( {
				    "bDestroy": true,
			        "bSort": false,
					 "bAutoWidth": false
				});
				/*$(".tbVentas").empty().append(tr);
				table.colReorder.reset();
          		table.draw();
				*/
				//table=$(".tbSacar").dataTable();
				//table.fnFilterClear();
				//table.draw()
				/*table.destroy();
				table = $('.tbSacar').DataTable({
					 "bDestroy": true,
			        "bSort": false,
					 "bAutoWidth": false
				});*/
				//oTable.fnDraw();
				//table.fnDraw();
			}
		})
		//alert("Submit formulario");
	})
	$(document).on("change",".cbProducto",function(e){
		//alert($(this).val());
		var frm = {
			idProducto: $(this).val()
		}
		fillPresentacion(frm);
	});
	
})