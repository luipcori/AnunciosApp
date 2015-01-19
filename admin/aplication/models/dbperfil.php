<?
if (is_file('../../../system/clases/class.dbutil.inc.php')) require_once('../../../system/clases/class.dbutil.inc.php');
else require_once ('../../../../../system/clases/class.dbutil.inc.php');

class dbperfil extends cDB {

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
			$res = $this->Update("perfil", $user,"`id` = $id");
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

			$res = $this->Update("perfil", $data,"`id` = $id");
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
			//$user[nom_perfil] = $nom;
			//$user[padre_perfil] = $apep;
			//$user[nivel_perfil] = $apem;
			//$user[sigla_perfil] = $perfil;
			//$user[estado] = $clave;
			
			$res = $this->Insert("perfil", $data);
			
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
			if($dato <> "") $sql = "SELECT id, nom_per
									FROM perfil 
									WHERE 
										nombre like '%$dato%' ORDER BY id ASC $limit";
			else $sql = "SELECT id, nom_per
									FROM perfil
									ORDER BY id ASC $limit";
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

	function mostrar_lista_permisos(){
		
		$row = array();
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id, nom_permiso, index_menu, descripcion, grupo
									FROM permisos ORDER BY grupo ASC";
			//echo $sql;
			$this->Query($sql);
			if ($this->numrows > 0) {
				$grupo = '';
				while($fila = $this->Next()) {
					if($grupo <> $fila[grupo]) { 
						echo '<tr><td><strong>'.$fila[grupo].'</strong></td>';
						echo '<td>:</td><td><input type="checkbox" name="'.$fila[nom_permiso].'" id="'.$fila[nom_permiso].'" value="'.$fila[id].'"></td></tr>';
					}
					$grupo = $fila[grupo];
					echo '<tr>';
					echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$fila[nom_permiso].'</td>';
					echo '</td><td>:</td><td>';
					echo '<input type="checkbox" name="'.$fila[nom_permiso].'" id="'.$fila[nom_permiso].'" value="'.$fila[id].'"';
					echo ' onclick="SelPrincipal('."'".$fila[grupo]."'".');">'.$fila[descripcion].'</td>';
					echo '</tr>';
				}
				//return $row;
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
			$sql = "SELECT  id, nom_per
							FROM perfil 
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
			$sql = "SELECT id FROM `perfil` 
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
			$sql = "SELECT id FROM `perfil` 
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