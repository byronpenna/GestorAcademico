$(document).ready(function(){
	$(".liIngresarStock").addClass("active");
	$( ".txtFecha" ).datepicker({ dateFormat: 'yy-mm-dd' });
	$('.tbIngresoProducto').DataTable({
		 "bAutoWidth": false
	});
	$(document).on("change",".cbProducto",function(e){
		//alert($(this).val());
		var frm = {
			idProducto: $(this).val()
		};
		fillPresentacion(frm);
	});
	$(document).on("click",".btnEditar",function(e){
		var tr = $(this).parents("tr");
		var edit;
		if(tr.find(".divNormal").hasClass("hidden")){
			edit = false;
		}else{
			edit = true;
		}
		if (edit){
			
		}
		editMode(tr,edit);
	});
	$(document).on("click",".btnCancelar",function(e){
		var tr = $(this).parents("tr");
		editMode(tr,false);
	})
	$(document).on("click",".btnEliminar",function(e){
		var x = confirm("¿Esta seguro que desea eliminar el producto?");
		if (x){
			var tr = $(this).parents("tr"); 
			var frm ={
				idProducto: tr.find(".txtHdIdProducto").val()
			}
			EliminarProducto(frm,function(data){
				if(data.estado){
					tr.remove();
				}
			})	
		}
	})
	$(document).on("click",".aNav",function(e){
		e.preventDefault();
		var target = $("."+$(this).attr("target"));
		$(".divTab").hide("slow");
		target.show("slow");
	});

})