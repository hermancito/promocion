function poneFecha(){
  fechaActual = new Date();
  dia = fechaActual.getDate();
  mes = fechaActual.getMonth()+1;
  ano = fechaActual.getFullYear();
  fechaImp = dia + " del " + mes + " de " + ano;
  document.getElementById("fecha").innerHTML = fechaImp;
}
/*
function cargaMunic(prov){
	var parametros = "provincia=" + prov.value + "&nocache=" + Math.random();
	var cargaMun=new net.CargadorContenidos("http://localhost/PROMOEDIT_GESTION/alta_centro.php", null, null, "POST", parametros,"application/x-www-form-urlencoded");
}

function borraMun(){
	var selMun=document.getElementById("mun");
	selMun.disabled=false;
	var opcAct=selMun.options.length;
	//después de habilitar el select borramos las localidades que contiene
	for(var j=0; j<opcAct; j++){
		selMun.options[0]=null;
	}
	//alert(provincia);
}
*/

$(function(){
	var munic=$("#mun");
	$("#prov").on("change", function(){
		var dato=$(this).val();
		//alert(dato);
		$.ajax({
			data: {provincia: dato},
		   	url: "select_prov.php",
		   	type: "post",
		   	dataType: "json",
        		success: function(respuesta){
        			munic.empty();
        			//console.log("aki successs");
        			for(indice in respuesta){
        				//console.log(respuesta[indice]);
        				$("<option>")
        					.val(respuesta[indice].municipio)
        					.text(respuesta[indice].municipio)
        					.appendTo(munic);
        			}
        		},
                //vaciamos la lista de provincias antes de cada nueva petición (cambio en select de pais)
        		beforeSend: function(){
        			munic.empty();
        			munic.append("<option>Cargando provincias, por favor, espere...</option>");
        		},
        		complete: function(){
        			//console.log("aki complete");
        		},
        		cache: false,
        		error: function(objajax, status, excepcion){
        			console.log(status, " / ", excepcion);
        		}
		   	
		});
	})
});