<?
class estructura{
	
	//public $im = 'al/las';
	
	function __construct() {
		}

	function mostrar_contenido_medio($opt){
		switch ($opt) {
/*Maestros*/
			
//aviso
			case '2838023a778dfaecdc212708f721b788':
								$edit = 'Listado de Avisos'; 
								$editAccion = '';
								include('aviso/ver.php');
								return 1;
								break;	


			case '67c6a1e7ce56d3d6fa748ab6d9af3fd7':
								$edit = 'Listado de avisos'; 
								$editAccion = 'Ingresar';
								include('aviso/modificar.php');
								return 1;
								break;	
								
			case '642e92efb79421734881b53e1e1b18b6':
								$edit = 'Listado de avisos'; 
								$editAccion = 'Modificar';
								include('aviso/modificar.php');
								return 1;
								break;	


//usuarios

			case 'c4ca4238a0b923820dcc509a6f75849b':
								$editAccion = 'ver';
								$edit = 'Usuarios'; 
								include('mantenimiento/usuarios/ver.php');
								return 1;
								break;	

			case 'c9f0f895fb98ab9159f51fd0297e236d': //5
								$editAccion = 'Nuevo';
								$edit = 'Usuarios'; 
								include('mantenimiento/usuarios/modificar.php');
								return 1;
								break;	

			case '45c48cce2e2d7fbdea1afc51c7c6ad26': //61
								$editAccion = 'Modificar';
								$edit = 'Usuarios'; 
								include('mantenimiento/usuarios/modificar.php');
								return 1;
								break;	

//categoria

			case '6512bd43d9caa6e02c990b0a82652dca':
								$editAccion = 'ver';
								$edit = 'categioria'; 
								include('mantenimiento/categoria/ver.php');
								return 1;
								break;	

			case 'c20ad4d76fe97759aa27a0c99bff6710': //5
								$editAccion = 'Nuevo';
								$edit = 'categioria'; 
								include('mantenimiento/categoria/modificar.php');
								return 1;
								break;	

			case 'c51ce410c124a10e0db5e4b97fc2af39': //61
								$editAccion = 'Modificar';
								$edit = 'categioria'; 
								include('mantenimiento/categoria/modificar.php');
								return 1;
								break;	

//permisos

			case '9bf31c7ff062936a96d3c8bd1f8f2ff3':
								$editAccion = 'ver';
								$edit = 'Perfiles'; 
								include('mantenimiento/perfiles/ver.php');
								return 1;
								break;	

			case 'c74d97b01eae257e44aa9d5bade97baf': //5
								$editAccion = 'Nuevo';
								$edit = 'Perfiles'; 
								include('mantenimiento/perfiles/modificar.php');
								return 1;
								break;	

			case '70efdf2ec9b086079795c442636b55fb': //61
								$editAccion = 'Modificar';
								$edit = 'Perfiles'; 
								include('mantenimiento/perfiles/modificar.php');
								return 1;
								break;	

//clave

			case '8cbbc409ec990f19c78c75bd1e06f215': 
								$editAccion = 'Cambiar Clave';
								$edit = 'Contraseña'; 
								include('mantenimiento/clave/modificar.php');
								return 1;
								break;	

			case '82c420d928d4bf8ce0ff21c19b371514': 
								$editAccion = 'Cambiar Clave';
								$edit = 'Contraseña'; 
								include('mantenimiento/clave/ver.php');
								return 1;
								break;






			default:	
								return 0;
		}
	
	}
	function generar_session(){
		$_SESSION['validate'] = md5($_SESSION['usuario_']);
	}	
	function validar_sesion(){
		//echo $_SESSION['validate'];
		//exit(); 
		if($_SESSION['validate'] == ''){
			//echo 'enter';
			$this->route(5,$dir);//
		}
	}
	function cerrar_session(){
		$_SESSION['validate'] = "";
		if(!$this->IsConnected()) $this->Disconnect();
		$this->route(6,$dir);
	}
	
	function route($op,$ruta){
		//echo $op;
		if($op == 1) echo "<script>location.href= 'index.php?opt=1';</script>";
		if($op == 2) echo "<script>location.href = 'index.php?opt=2';</script>";
		if($op == 3) echo "<script>location.href = 'index.php?opt=3';</script>";
		if($op == 4) { $this->generar_session(); echo "<script>location.href = 'principal.php';</script>";}
		if($op == 5) echo "<script>location.href = 'index.php?opt=5';</script>";
		if($op == 6) echo "<script>location.href = 'index.php?opt=6';</script>";
	}
	function nombre_usuario(){
		return $_SESSION['nom_'].' '.$_SESSION['apep_'];
	}
}
?>