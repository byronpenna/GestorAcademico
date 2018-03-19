// configuraciones 
	var Mensajeria  = function(){

	}
	var Configuracion   = function () {

	}
// ajax 
	var Serializar = function () {
		// propiedades
            
        // funciones
            this.json = function (a) {
                var o = {};
                $.each(a, function () {
                    if (o[this.name]) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = this.value || '';
                    }
                });
                return o;
            }
            this.sectionToJson = function (section) {
                var frm = this.json(section.find("input,select,textarea").serializeArray());
                return frm;
            }
            this.formularioToJson = function (frm) {
                var frm = serializeToJson(frm.serializeArray());
                return frm;
            }
	}
	var PeticionAjax = function (url, frm, method) {
		if (method === undefined) {
            method = "POST";
        }
        // propiedades
            this.url            = url;
            this.method         = method;
            this.frm            = frm;
        // funciones
            this.peticion           = function (callback,before,errorF) {
            	$.ajax({
                    url: url,
                    type: this.method,
                    error: function (xhr, status, error) {
                        if (error !== undefined) {
                            errorF(xhr, status, error);
                        }
                    },
                    data: {
                        
                        form: JSON.stringify(this.frm)
                    },
                    beforeSend: function () {
                        if (before !== undefined) {
                            before();
                        }
                    },
                    success: function (data) {
                        if (!data.estado && data.recargar) {
                            location.reload();
                        } else {
                            callback(data);
                        }
                    }
                });
            }
            this.peticionConImagen  = function (callback,before,errorF) {
		        $.ajax({
		            type: "POST",
		            url: url,
		            contentType: false,
		            processData: false,
		            data: frm,// utiliza la misma variable pero esta debe ser de tipo "formdata"
		            beforeSend: function () {
		                if (before !== undefined) {
		                    before();
		                }
		            },
		            success: function (data) {
		                if (!data.estado && data.recargar) {
		                    location.reload();
		                } else {
		                    callBack(data);
		                }
		            },
		            error: function (xhr, status, p3, p4) {
		                if (errorF !== undefined) {
		                    errorF(xhr, status, p3);
		                }
		            
		            }
		        });
		    }
	}
// elementos
    var TablaGeneral = function (nColumnas) {
        this.plantillaTr        = "";
        this.plantillaTrVacia   = "";
        this.generarPlantillaTr = function (nColumnas) {
            this.plantillaTr += "<tr>";
            this.plantillaTr += "<td class='hidden'>@hidden</td>";
            for (var i = 0; i < nColumnas; i++) {
                this.plantillaTr += "<td>@td" + (i+1) + "</td>";
            }
            this.plantillaTr += "</tr>";
            this.plantillaTrVacia = "\
                                        <tr>\
                                            <td class='text-center tdVacio' colspan='"+nColumnas+"'>@contenido</td>\
                                        </tr>"
        }
        
    }
