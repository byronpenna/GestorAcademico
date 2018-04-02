$(document).ready(function(){

	//console.log("Impresion consola");
	var frm = {
		idAnio: $(this).val()
	}
	llenarSeccion(frm);
	$(document).on("change",".cbAnio",function(e){
		var frm = {
			idAnio: $(this).val()
		}
		llenarSeccion($frm);
	})
})