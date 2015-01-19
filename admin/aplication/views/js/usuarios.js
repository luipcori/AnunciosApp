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
		document.getElementById('frmListado').action = 'principal.php?opt=8f14e45fceea167a5a36dedd4bea2543';
		document.getElementById('frmListado').submit();
		return false;
	}
	if(accion == 'new'){
		document.getElementById('frmListado').action = 'principal.php?opt=c9f0f895fb98ab9159f51fd0297e236d';
		document.getElementById('frmListado').submit();
		return false;
	}


	if(idItem == ""){
		alert('Debe Seleccionar un Item!!!');
		return false;
	}else{
		//alert(idItem);
		if(accion == 'edit'){
			document.getElementById('frmListado').action = 'principal.php?opt=45c48cce2e2d7fbdea1afc51c7c6ad26';
			document.getElementById('codigo').value = idItem;
			document.getElementById('frmListado').submit();
			return false;
		}
		if(accion == 'delete'){
			if (confirm("Esta seguro eliminar el Item?")) {
						document.getElementById('frmListado').action = 'mantenimiento/usuarios/mantenimiento.php';
						document.getElementById('option').value = 'RE';
						document.getElementById('codigo').value = idItem;
						document.getElementById('frmListado').submit();
			}else return false;
			
		}

	}
}
function ver_mod(accion,edit){
	if(accion == 'cancel'){
		document.getElementById('frmMod').action = "principal.php?opt=c4ca4238a0b923820dcc509a6f75849b";
		document.getElementById('frmMod').submit();
		return false;
	}

	if(accion == 'new'){
		if(validar()){
			document.getElementById('frmMod').action = 'mantenimiento/usuarios/mantenimiento.php';
			document.getElementById('option').value = 'RI';
			document.getElementById('frmMod').submit();
			return false;
		}else return false;
	}
	if(accion == 'edit'){
		if(validar()){
			document.getElementById('frmMod').action = 'mantenimiento/usuarios/mantenimiento.php';
			document.getElementById('option').value = 'RM';
			document.getElementById('frmMod').submit();
			return false;
		}else return false;
	}

}

function validar(){
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

