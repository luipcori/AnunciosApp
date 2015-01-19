jQuery.noConflict();
function CallRemote(pag,valores,dst){
		jQuery.ajax({
			type: "POST",
			url: pag,
			data: valores,
			success: function(datos){
				if(datos!="") {
					document.getElementById('usuario').value = '';
					setTimeout("document.getElementById('usuario').focus()",0);
				}
				jQuery(dst).html(datos);
			}
		});	
};
function exite_usuario(pag,datos,dest){
	CallRemote(pag,datos,dest);
}


function ocultar_mensaje(div,t){
	//alert(div);
	var divaux ="document.getElementById('"+div+"').style.display = 'none'";
	//alert(divaux);
	setTimeout(divaux,5000);
} 
function mostrar_mensaje(div,t){
	document.getElementById(div).style.display = 'block';
}


function setFocus() {
		document.login.username.select();
		document.login.username.focus();
}
var datos=new Array();
function AbrirVentanaModal(band){
	// 1 - Oficina [para evitar elegir al padre asi mismo] , 0 para los demoas formulario
//	datos=showModalDialog('../../../plugin/arbol/oficina.php?band='+band, window,'status:no;resizable:no;dialogHeight:300px;dialogWidth:300px;center:yes;status:no;help:no;'); 
	//datos=window.open('../../../plugin/arbol/oficina.php?band='+band);

var url;
url = '../../../plugin/arbol/oficina.php?band='+band;
//if (window.showModalDialog) {
//window.showModalDialog(url, "name1", "dialogWidth:650px;dialogHeight:500px")
//}
//else {
window.open(url, 'name2', 'width=650,height=500,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no ,modal=yes');
//}

}

function VerOficina(opcion){
	if(opcion == 1){
		document.getElementById('VerOficina').style.display = 'block';
	}
	if(opcion == 2){
		document.getElementById('VerOficina').style.display = 'none';
	}
}