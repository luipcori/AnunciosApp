<?
	function mensajes($op,$valor){
		if($op==1){ //login
			if($valor <> "") echo "<script>mostrar_mensaje('mensaje-login',5000);</script>";
			switch ($valor){
				case 1:{ echo '[El usuario no se encuenta ACTIVO!!!]';
					break;
					}
				case 2:{ echo '[La clave es incorrecta!!!]';
					break;
					}
				case 3:{ echo '[El usuario no existe!!!]';
					break;
					}
				case 5:{ echo '[Su sessi&oacute;n ha Expirado, debe volver a loguearse!!!]';
					break;
					}
				case 6:{ echo '[Ha cerrado sesi&oacute;n con Exito!!!]';
					break;
					}
				case 7:{ echo '[La acci&oacute;n se realiz&oacute; sin Exito!!!]';
					break;
					}
				case 8:{ echo '[La acci&oacute;n se realiz&oacute; con Exito!!!]';
					break;
					}
				case 9:{ echo '[El usuario ya EXISTE!!!]';
					break;
					}
				case 10:{ echo '';
					break;
				}


			}
			echo "<script>ocultar_mensaje('mensaje-login',5000);</script>";
		}
		
	
	}
?>