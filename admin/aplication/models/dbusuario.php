<?
if (is_file('../../../system/clases/class.dbutil.inc.php')) require_once('../../../system/clases/class.dbutil.inc.php');
else require_once ('../../../../../system/clases/class.dbutil.inc.php');

class dbusuario extends cDB {

	function __construct() {
		}
	function open_db(){
		if(is_file('../../../../../config/config.php')) require_once('../../../../../config/config.php');
		$datos = new fdefi();
		//$this->Connect("127.0.0.1", "administracion", "root", "123456");
		$this->Connect($datos->host, $datos->database, $datos->user, $datos->passwd);
	}
	function eliminar($id){
		$this->open_db();
		if ($this->IsConnected()) {
			//echo "Estoy conectado.<br />";
			$user = array();
			$user[eliminado] = 1;
			$res = $this->Update("usuario", $user,"`id` = $id");
			//$this->lastsql;
			if ($res) return true;
			else  return false;
			
			$this->Disconnect(); 
		
		} else {
		$this->ShowLastError();
		}
	}
	
	function editar($id,$data){
		$this->open_db();
		if ($this->IsConnected()) {
			//echo "Estoy conectado.<br />";

			$res = $this->Update("usuario", $data,"`id` = $id");
			//echo $this->lastsql;			
			if ($res) return true;
			else  return false;
			
			$this->Disconnect(); 
		
		} else {
		$this->ShowLastError();
		}
	}

	function ingresar($data){
		$this->open_db();
		if ($this->IsConnected()) {
			//echo "Estoy conectado.<br />";
			
			//var_dump($data);
			
			//exit();
			//$user = array();
			//$user[nom_usuario] = $nom;
			//$user[padre_usuario] = $apep;
			//$user[nivel_usuario] = $apem;
			//$user[sigla_usuario] = $usuario;
			//$user[estado] = $clave;
			
			$res = $this->Insert("usuario", $data);
			
			if ($res) return $this->last_id;
			else  return false;
			
			$this->Disconnect(); 
		
		} else {
		$this->ShowLastError();
		}
	}


	function mostrar_registros($dato,$limit){
		
		$row = array();
		$this->open_db();
		if($this->IsConnected()){
			if($dato <> "") $sql = "SELECT u.id, nom_tra,apep_tra, apem_tra, mail_tra, dni_tra, tel_tra, sexo_tra
									idperfil, p.nom_per, u.estado, usuario, clave
									FROM usuario as u, perfil as p
									WHERE 
										u.idperfil = p.id
										and u.eliminado = 0
										and u.nom_tra like '%$dato%' ORDER BY id ASC $limit";
			else $sql = "SELECT u.id, nom_tra,apep_tra, apem_tra, mail_tra, dni_tra, tel_tra, sexo_tra
									idperfil, p.nom_per, u.estado, usuario, clave
									FROM usuario as u, perfil as p
									WHERE 	
										u.idperfil = p.id
										and u.eliminado = 0 ORDER BY id ASC $limit";
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

	function buscar_item($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT  id, nom_tra,apep_tra, apem_tra, mail_tra,dir_tra, dni_tra, tel_tra, sexo_tra,usuario, clave, idperfil, estado
							FROM usuario 
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

function existe($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id FROM `usuario` 
							WHERE `eliminado` = 0 
								AND id = '$dato'";
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

function listado_perfil(){
		
		$row = array();
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id, nom_per FROM perfil WHERE  eliminado = 0 order by nom_per";
			echo $sql;
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

function CrearUsuario($nom, $apep){
		
 	$simbolos   = array("ñ", "Ñ", "");
	$reemplazo  = array("n", "N", "");
	$apep = str_replace($simbolos, $reemplazo, $apep);					
	$user = $nom[0].$apep;	
	$userAux = strtolower($user);
	//echo $userAux;
	//exit();
	$i=0;
	while($this->BuscarUsuarioIgual($userAux)){
		$i++;
		$userAux = $user . $i;
		$userAux = strtolower($userAux);
	}
	echo $userAux;
}
function BuscarUsuarioIgual($user){
		$row = array();
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT usuario FROM usuario WHERE usuario = '$user' ";
			//echo $sql;
			$this->Query($sql);
			if ($this->numrows > 0) return 1;
			else return 0;
			$this->Disconnect();

		} else {
			$this->ShowLastError(); return false;
		}	


}
function NomFiliacion($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT  nom FROM `filiacion` WHERE id = '$dato'";
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($fila = $this->First()) {
					return $fila[nom];
			} else {
				//echo "No existe región para el país con id = 1.<br />";
			}
			$this->Disconnect();
		
			
		} else {
			$this->ShowLastError(); return false;
		}	
	}
function ApepFiliacion($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT apep FROM `filiacion` WHERE id = '$dato'";
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($fila = $this->First()) {
					return $fila[apep];
			} else {
				//echo "No existe región para el país con id = 1.<br />";
			}
			$this->Disconnect();
		
			
		} else {
			$this->ShowLastError(); return false;
		}	
	}
function ClaveUsuario($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT clave FROM usuario WHERE idfiliacion = '$dato'";
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($fila = $this->First()) {
					return $fila[clave];
			} else {
				//echo "No existe región para el país con id = 1.<br />";
			}
			$this->Disconnect();
		
			
		} else {
			$this->ShowLastError(); return false;
		}	
	}
function IdUsuario($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id FROM usuario WHERE idfiliacion = '$dato'";
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($fila = $this->First()) {
					return $fila[id];
			} else {
				//echo "No existe región para el país con id = 1.<br />";
			}
			$this->Disconnect();
		
			
		} else {
			$this->ShowLastError(); return false;
		}	
	}

function IdUsuario2($dato){
		
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id FROM usuario WHERE idlideres = '$dato'";
			//echo $sql;
			//exit();
			$this->Query($sql);
			if ($fila = $this->First()) {
					return $fila[id];
			} else {
				//echo "No existe región para el país con id = 1.<br />";
			}
			$this->Disconnect();
		
			
		} else {
			$this->ShowLastError(); return false;
		}	
	}


}
?>