jQuery.noConflict();
var idItem='';
function SeleccionarId(elemento){
	idItem = elemento.value;
	//alert(idItem);
}

function submitbutton(accion){
	if(accion == 'cancel'){
		document.getElementById('frmListado').action = 'principal.php';
		document.getElementById('frmListado').submit();
		return false;
	}
	if(accion == 'search'){
		document.getElementById('frmListado').action = 'principal.php?opt=2838023a778dfaecdc212708f721b788';
		document.getElementById('frmListado').submit();
		return false;
	}
	if(accion == 'new'){
		document.getElementById('frmListado').action = 'principal.php?opt=67c6a1e7ce56d3d6fa748ab6d9af3fd7';
		document.getElementById('frmListado').submit();
		return false;
	}

	if(idItem == ""){
		alert('Debe Seleccionar un Item!!!');
		return false;
	}else{
		if(accion == 'edit'){
			document.getElementById('frmListado').action = 'principal.php?opt=642e92efb79421734881b53e1e1b18b6';
			document.getElementById('bandId').value = '';
			document.getElementById('codigo').value = idItem;
			document.getElementById('frmListado').submit();
			return false;
		}
		if(accion == 'delete'){
			if (confirm("Esta seguro eliminar el Item?")) {
						document.getElementById('frmListado').action = 'aviso/mantenimiento.php';
						document.getElementById('option').value = 'RE';
						document.getElementById('codigo').value = idItem;
						document.getElementById('frmListado').submit();
			}else return false;
			
		}

	}
}
function ver_mod(accion,edit){
	if(accion == 'cancel'){
		document.getElementById('frmMod').action = "principal.php?opt=2838023a778dfaecdc212708f721b788";
		document.getElementById('frmMod').submit();
		return false;
	}
	if(accion == 'cancelM'){
		document.getElementById('frmMod').action = "principal.php?opt=3295c76acbf4caaed33c36b1b5fc2cb1";
		document.getElementById('frmMod').submit();
		return false;
	}
	if(accion == 'new'){
		//ExisteDni();
		if(validar1()){
			//if(document.getElementById('dniAux').value == 1) alert('Este DNI ya fue registrado');		
			//else {
				document.getElementById('frmMod').action = 'aviso/mantenimiento.php';
				document.getElementById('option').value = 'RI';
				//document.getElementById('user1').value = document.getElementById('usuario').value;
				document.getElementById('frmMod').submit();
				return false;
			//}
		}else return false;
			
	}
	if(accion == 'edit'){
		if(validar1()){
			document.getElementById('frmMod').action = 'aviso/mantenimiento.php';
			document.getElementById('option').value = 'RM';
			document.getElementById('frmMod').submit();
			return false;
		}else return false;
	}

}

function validar1(){
	return true;
  if (document.getElementById('dni').value=="") {
    alert('[ERROR] Debe indicar el DNI ...');
	setTimeout("document.getElementById('dni').focus()",0);
    return false;
  }
	return true;
}
function validar(){
	return true;
  if (document.getElementById('dni_tra').value=="") {
    alert('[ERROR] Debe indicar el DNI ...');
	setTimeout("document.getElementById('dni_tra').focus()",0);
    return false;
  } else if (document.getElementById('nom_tra').value=="") {
    alert('[ERROR] Debe indicar el Nombre ...');
	setTimeout("document.getElementById('nom_tra').focus()",0);
    return false;
  }else if (document.getElementById('apep_tra').value=="") {
    alert('[ERROR] Debe indicar el Apellido Paterno ...');
	setTimeout("document.getElementById('apep_tra').focus()",0);
    return false;
  }else if ((document.getElementById('clave').value!=document.getElementById('clave1').value)) {
    alert('[ERROR] Las Claves deben ser iguales ...');
	setTimeout("document.getElementById('clave').focus()",0);
    return false;
  }else if ((document.getElementById('clave').value=="")) {
    alert('[ERROR] Las Claves no pueden ser vacias ...');
	setTimeout("document.getElementById('clave').focus()",0);
    return false;
  } else if (document.getElementById('idperfil').value=='0') {
    alert('[ERROR] Debe elegir un Perfil ...');
	setTimeout("document.getElementById('idperfil').focus()",0);
    return false;
  }
  
   
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;

}

function CrearUsuario(){
		jQuery.ajax({
			type: "POST",
			url: 'mantenimiento/usuarios/mantenimiento.php',
			data: 'option=RMCU&nom=' + document.getElementById('nom_tra').value + '&apep=' + document.getElementById('apep_tra').value,
			success: function(datos){
				if(datos!="") {
					document.getElementById('usuario').value = datos;
					//setTimeout("document.getElementById('usuario').focus()",0);
				}
				//jQuery(dst).html(datos);
			}
		});	
};



function CallBuscador(pag,valores,dst,tabla){
		jQuery.ajax({
			type: "POST",
			url: pag,
			data: valores + '&divC='+dst+'&tabla='+tabla,
			success: function(datos){
				document.getElementById(dst).innerHTML = datos;
				
			}
		});	
};
function CallBuscador1(pag,valores,dst,tabla){
		var criterio = "";
		criterio = '&criterio=' + document.getElementById('dato').value;
			jQuery.ajax({
				type: "POST",
				url: pag,
				data: valores + criterio + '&divC='+dst +'&tabla='+tabla,
				success: function(datos){
					document.getElementById(dst).innerHTML = datos;
					
				}
			});	

};

function LimpiarSelect(id){
	document.getElementById(id).selectedIndex = 0;
	document.getElementById('divVerPago').style.display = 'none';
	document.getElementById('realizarPago').checked = false;	
}