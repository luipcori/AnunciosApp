<?
require_once('../../../system/clases/class.dbutil.inc.php');
class dbusuario extends cDB {

	function __construct() {
		}
	function open_db(){
		$datos = new fdefi();
		//$this->Connect("127.0.0.1", "administracion", "root", "123456");
		$this->Connect($datos->host, $datos->database, $datos->user, $datos->passwd);
	}
	function eliminar_usuario($id){
		$this->open_db();
		if ($this->IsConnected()) {
			//echo "Estoy conectado.<br />";
			$user = array();
			$user[eliminado] = 1;
			$res = $this->Update("usuario", $user,"`id` = $id");
			
			if ($res) return true;
			else  return false;
			
			$this->Disconnect(); 
		
		} else {
		$this->ShowLastError();
		}
	}
	
	function editar_usuario($id,$nom,$apep,$apem,$usuario,$clave,$mail,$estado){
		$this->open_db();
		if ($this->IsConnected()) {
			//echo "Estoy conectado.<br />";
			$user = array();
			$user[nom] = $nom;
			$user[apep] = $apep;
			$user[apem] = $apem;
			$user[usuario] = $usuario;
			$user[clave] = $clave;
			$user[mail] = $mail;
			$user[estado] = $estado;
			
			$res = $this->Update("usuario", $user,"`id` = $id");
			
			if ($res) return true;
			else  return false;
			
			$this->Disconnect(); 
		
		} else {
		$this->ShowLastError();
		}
	}

	function ingresar_usuario($nom,$apep,$apem,$usuario,$mail,$clave){
		$this->open_db();
		if ($this->IsConnected()) {
			//echo "Estoy conectado.<br />";
			$user = array();
			$user[nom] = $nom;
			$user[apep] = $apep;
			$user[apem] = $apem;
			$user[usuario] = $usuario;
			$user[mail] = $mail;
			$user[clave] = $clave;
			
			$res = $this->Insert("usuario", $user);
			
			if ($res) return $this->last_id;
			else  return false;
			
			$this->Disconnect(); 
		
		} else {
		$this->ShowLastError();
		}
	}


	function mostrar_usuarios($dato,$limit){
		
		$row = array();
		$this->open_db();
		if($this->IsConnected()){
			if($dato <> "") $sql = "SELECT id, nom, apep, apem, estado, usuario, mail 
									FROM `usuario` 
									WHERE `eliminado` = 0 AND `usuario` like '%$dato%' ORDER BY id ASC $limit";
			else $sql = "SELECT id, nom, apep, apem, estado, `usuario` , mail
									FROM `usuario` 
									WHERE `eliminado` = 0 ORDER BY id ASC $limit";
			//echo $sql;
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

	function buscar_usuario($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id, nom, apep, apem, estado, usuario, clave, mail 
							FROM `usuario` 
							WHERE `eliminado` = 0 
								AND id = '$dato'";
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($fila = $this->First()) {
					return $fila;
			} else {
				//echo "No existe región para el país con id = 1.<br />";
			}
			$this->Disconnect();
		
			
		} else {
			$this->ShowLastError(); return false;
		}	
	}
	function existe_usuario($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id FROM `usuario` 
							WHERE `eliminado` = 0 
								AND usuario = '$dato'";
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($fila = $this->First()) {
					return 1;
			} else {
				return 0;
			}
			$this->Disconnect();
		
			
		} else {
			$this->ShowLastError(); return false;
		}	
	}
	function nro_registros(){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id FROM `usuario` 
							WHERE `eliminado` = 0";
			//echo $sql;
			//exit();
			
			return $this->GetNumRows($this->Query($sql));
						
			$this->Disconnect();
		
		} else {
			$this->ShowLastError(); return false;
		}	
	}

}
?>