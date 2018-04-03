$(document).ready(function(){

	//console.log("Impresion consola");
	iniciales();
	$(document).on("change",".cbAnio",function(e){
		eventoChangeCbAnio();
	})
	$(document).on("click",".btnCargar",function(e){
		var frm = {
			idSeccion: $(".cbSeccion").val()	
		}
		cargarTablaInscritos(frm);
	})
})