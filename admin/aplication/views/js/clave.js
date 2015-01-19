function ver_mod(accion,edit){
	if(accion == 'cancel'){
		document.getElementById('frmMod').action = "principal.php";
		document.getElementById('frmMod').submit();
		return false;
	}

	if(accion == 'edit'){
		if(validar()){
			document.getElementById('frmMod').action = 'mantenimiento/clave/mantenimiento.php';
			document.getElementById('option').value = 'RM';
			document.getElementById('frmMod').submit();
			return false;
		}else return false;
	}

}

function validar(){
 if (document.getElementById('claveNueva').value=="") {
    alert('[ERROR] Debe indicar una nueva Clave ...');
	setTimeout("document.getElementById('claveNueva').focus()",0);
    return false;
  }else if (document.getElementById('claveNueva1').value=="") {
    alert('[ERROR] Debe repetir la nueva clave ...');
	setTimeout("document.getElementById('claveNueva1').focus()",0);
    return false;
  }else if ((document.getElementById('claveNueva').value!=document.getElementById('claveNueva1').value)) {
    alert('[ERROR] Las Claves deben ser iguales ...');
	setTimeout("document.getElementById('claveNueva').focus()",0);
    return false;
  }
  
   
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;

}