<?
require_once ('../../../config/config.php');
require('class.dbutil.inc.php');
class validate extends cDB {	
	//public $im = 'al/las';	
	function __construct() {
		}
	function logueo($user, $pass){
//		$this->Connect($datos->host, $datos->$database, $datos->user, $datos->passwd);
		
		$datos = new fdefi();
		$this->Connect($datos->host, $datos->database, $datos->user, $datos->passwd);
		
		if ($this->IsConnected()) {
			//echo "Estoy conectado.<br />";
			$pass = md5($pass);
			$sql = "
					SELECT
						u.id,
						
						usuario,
						clave,
						estado, 
						nom_tra, 
						apep_tra, 
						apem_tra,
						idperfil
						
					FROM 
						usuario as u 
					WHERE 
						u.eliminado = 0 
						AND `usuario` = '$user'";
			
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($fila = $this->First()) {
				
				if($fila[estado] == 0) { $this->Disconnect(); return 1;}// el usuario no esta activo
				if($fila[clave] <> $pass) {$this->Disconnect(); return 2;} //la clave es incorrecta
				$defi = new fdefi();
				//echo "<pre>";
				//print_r($fila);
				$this->Disconnect();
				
				
			
				$_SESSION['idUsuario_'] = $fila[id];
				$_SESSION['usuario_'] = $fila[usuario];
				$_SESSION['nom_'] = $fila[nom_tra];
				$_SESSION['apep_'] = $fila[apep_tra];
				$_SESSION['apem_'] = $fila[apem_tra];
				$_SESSION['idperfil_'] = $fila[idperfil];
				$_SESSION['carpeta_'] = $defi->CarpetaWeb;
				///var_dump($this->obtener_permisos($fila[perfil]));
				$_SESSION['permisos_'] = $this->obtener_permisos($fila[idperfil]);
				return 4; 
				//echo "</pre>";
			} else  { $this->Disconnect(); return 3; }//El usuario no existe
		
		} else {
		$this->ShowLastError();
		}
		
	}
	function obtener_permisos($id){

		$row = array();

		$datos = new fdefi();
		$this->Connect($datos->host, $datos->database, $datos->user, $datos->passwd);

		if($this->IsConnected()){
			$sql = "SELECT idperfil, idpermiso,nom_permiso
									FROM perfil_permiso as pp, permisos as p 
									WHERE 
									p.id = pp.idpermiso
									AND idperfil = $id";
			
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($this->numrows > 0) {
				while($fila = $this->Next()) {
					$row[] = $fila;
				}
				return $row;
			} else {
					echo "No hay registros!!!.<br />";
					return false;
			}
			$this->Disconnect();

		} else {
			$this->ShowLastError(); return false;
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
		//exit();
		echo 'Validando ...';
		if($op == 1) echo "<script>location.href= '../admin/index.php?opt=1';</script>";
		if($op == 2) echo "<script>location.href = '../admin/index.php?opt=2';</script>";
		if($op == 3) echo "<script>location.href = '../admin/index.php?opt=3';</script>";
		if($op == 4) { $this->generar_session(); echo "<script>location.href = '../admin/principal.php';</script>";}
		if($op == 5) echo "<script>location.href = '../admin/index.php?opt=5';</script>";
		//if($op == 6) echo "<script>location.href = '../admin/index.php?opt=6';</script>";
        if($op == 6) echo "<script>location.href = '/AnunciosApp/index.php';</script>";  //cierra sesion y envio el acceso a pag tipo usuario publico
	}
	function nombre_usuario(){
		return $_SESSION['nom_'].' '.$_SESSION['apep_'];
	}
}
?>