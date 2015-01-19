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
		document.getElementById('frmListado').action = 'principal.php?opt=6512bd43d9caa6e02c990b0a82652dca';
		document.getElementById('frmListado').submit();
		return false;
	}
	if(accion == 'new'){
		document.getElementById('frmListado').action = 'principal.php?opt=c20ad4d76fe97759aa27a0c99bff6710';
		document.getElementById('frmListado').submit();
		return false;
	}


	if(idItem == ""){
		alert('Debe Seleccionar un Item!!!');
		return false;
	}else{
		//alert(idItem);
		if(accion == 'edit'){
			document.getElementById('frmListado').action = 'principal.php?opt=c51ce410c124a10e0db5e4b97fc2af39';
			document.getElementById('codigo').value = idItem;
			document.getElementById('frmListado').submit();
			return false;
		}
		if(accion == 'delete'){
			if (confirm("Esta seguro eliminar el Item?")) {
						document.getElementById('frmListado').action = 'mantenimiento/categoria/mantenimiento.php';
						document.getElementById('option').value = 'RE';
						document.getElementById('codigo').value = idItem;
						document.getElementById('frmListado').submit();
			}else return false;
			
		}

	}
}
function ver_mod(accion,edit){
	if(accion == 'cancel'){
		document.getElementById('frmMod').action = "principal.php?opt=6512bd43d9caa6e02c990b0a82652dca";
		document.getElementById('frmMod').submit();
		return false;
	}

	if(accion == 'new'){
		if(validar()){
			document.getElementById('frmMod').action = 'mantenimiento/categoria/mantenimiento.php';
			document.getElementById('option').value = 'RI';
			document.getElementById('frmMod').submit();
			return false;
		}else return false;
	}
	if(accion == 'edit'){
		if(validar()){
			document.getElementById('frmMod').action = 'mantenimiento/categoria/mantenimiento.php';
			document.getElementById('option').value = 'RM';
			document.getElementById('frmMod').submit();
			return false;
		}else return false;
	}

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