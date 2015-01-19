<?
if (is_file('../../../system/clases/class.dbutil.inc.php')) require_once('../../../system/clases/class.dbutil.inc.php');
else if(is_file('../../../../../system/clases/class.dbutil.inc.php')) require_once('../../../../../system/clases/class.dbutil.inc.php');
else require_once('../../../../system/clases/class.dbutil.inc.php');
class dbcategoria extends cDB {

	function __construct() {
		}
	function open_db(){
		if(is_file('../../../../../config/config.php')) require_once('../../../../../config/config.php');
		if(is_file('../../../../config/config.php')) require_once('../../../../config/config.php');
		$datos = new fdefi();
		//$this->Connect("127.0.0.1", "administracion", "root", "123456");
		$this->Connect($datos->host, $datos->database, $datos->user, $datos->passwd);
		$this->SetUTF8(true);
	}
	function eliminar($id){
		$this->open_db();
		if ($this->IsConnected()) {
			//echo "Estoy conectado.<br />";
			$user = array();
			$user[eliminado] = 1;
			$res = $this->Update("categorias", $user,"`id` = $id");
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

			$res = $this->Update("categorias", $data,"`id` = $id");
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

			$res = $this->Insert("categorias", $data);
			
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
			$dat = str_replace(' ','%',$dato);
			if($dato <> "") $sql = "select 
										*
									from 
										categorias
									where
										eliminado = 0
										and descripcion like '%$dato%'
							   		ORDER BY orden asc $limit";
			else $sql = "select *
									from 
										categorias
									where
										eliminado = 0
							   		ORDER BY orden asc $limit";
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
			$sql = "select * 
					from 
						categorias
					where
						id = '$dato'";
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
			$sql = "SELECT id FROM `categorias` 
							WHERE `eliminado` = 0 
								AND id = '$dato'";
			////echo $sql;
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



function nro_registros($dato){
		
		$this->open_db();
		if($this->IsConnected()){
						if($dato <> "") $sql = "select 
										*
									from 
										categorias
									where
										eliminado = 0
										and descripcion like '%$dato%'
							   		ORDER BY  orden asc $limit";
			else $sql = "select 
										*
									from 
										categorias
									where
										eliminado = 0
							   		ORDER BY orden asc $limit";
			//echo $sql;
			//exit();
			
			return $this->GetNumRows($this->Query($sql));
						
			$this->Disconnect();
		
		} else {
			$this->ShowLastError(); return false;
		}	
	}





function CambiarChatSet($cadena){
/*	$cadena = str_replace('á','&aacute',$cadena);
	$cadena = str_replace('é','&eacute',$cadena);
	$cadena = str_replace('í','&iacute',$cadena);
	$cadena = str_replace('ó','&oacute',$cadena);
	$cadena = str_replace('ú','&uacute',$cadena);
	$cadena = str_replace('ñ','&ntilde',$cadena);

	$cadena = str_replace('Á','&Aacute',$cadena);
	$cadena = str_replace('É','&Eacute',$cadena);
	$cadena = str_replace('Í','&Iacute',$cadena);
	$cadena = str_replace('Ó','&Oacute',$cadena);
	$cadena = str_replace('Ú','&Uacute',$cadena);
	$cadena = str_replace('Ñ','&Ntilde;',$cadena);
	*/
	//str_replace(
	return $cadena;
}


}
?>