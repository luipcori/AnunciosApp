jQuery.noConflict();
var idItem='';
function submitbutton(accion,edit){

	if(accion == 'cancel'){
		document.getElementById('frmMod').action = "principal.php?opt=4e732ced3463d06de0ca9a15b6153677";
		document.getElementById('frmMod').submit();
		return false;
	}

	if(accion == 'preview'){
		document.getElementById('frmMod').action = "reportes/reporte1.php";
		document.getElementById('frmMod').submit();
		return false;
	}


}

function ExisteDni(){
		jQuery.ajax({
			type: "POST",
			async: false,
			url: 'encuesta/filiacion/mantenimiento.php',
			data: 'option=RDNI&dni='+ document.getElementById('dni').value,
			success: function(datos){
				//if(datos!="") {
					//alert( datos);
					document.getElementById('dniAux').value = datos;
				//}
				//jQuery('por').html(datos);
			}
		});	
};
function LlamarCombo(url, data, div){
		jQuery.ajax({
			type: "POST",
			url: url,
			data: data,
			success: function(datos){
				document.getElementById(div).innerHTML = datos;
				//if(datos!="") {
				//	document.getElementById('usuario').value = datos;
					//setTimeout("document.getElementById('usuario').focus()",0);
				//}
				//jQuery(div).innerHTML (datos);
			}
		});	
};