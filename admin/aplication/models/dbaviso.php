<?
if (is_file('../../../system/clases/class.dbutil.inc.php')) require_once('../../../system/clases/class.dbutil.inc.php');
else if(is_file('../../../../../system/clases/class.dbutil.inc.php')) require_once('../../../../../system/clases/class.dbutil.inc.php');
else require_once('../../../../system/clases/class.dbutil.inc.php');
class dbaviso extends cDB {

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
			$res = $this->Update("anuncios", $user,"`id` = $id");
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

			$res = $this->Update("anuncios", $data,"`id` = $id");
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

			$res = $this->Insert("anuncios", $data);

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
        $hoy = date("Ymd"); //año 4 digitos, mes y dia
		if($this->IsConnected()){
			$dat = str_replace(' ','%',$dato);
			if($dato <> "") $sql = "select
										anu.id as id, cat.descripcion as categoria, anu.titulo, anu.detalle, anu.imagen, anu.fecha_pub, anu.fecha_limite
									from
										anuncios as anu left join categorias as cat on anu.categoria = cat.id
									where
										anu.eliminado = 0
										and anu.titulo like '%$dato%'

							   		ORDER BY anu.id DESC $limit";
			else $sql = "select
										anu.id as id, cat.descripcion as categoria, anu.titulo, anu.detalle, anu.imagen, anu.fecha_pub, anu.fecha_limite
									from
										anuncios as anu left join categorias as cat on anu.categoria = cat.id
									where
										anu.eliminado = 0

							   		ORDER BY anu.id DESC $limit";
			//echo $sql;         and anu.fecha_limite> '$hoy' para listar solo los activos
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
						anuncios
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
			$sql = "SELECT id FROM `anuncios` 
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
										anuncios
									where
										eliminado = 0
										and titulo like '%$dato%'
							   		ORDER BY  id DESC $limit";
			else $sql = "select 
										*
									from 
										anuncios
									where
										eliminado = 0
							   		ORDER BY titulo DESC $limit";
			//echo $sql;
			//exit();
			
			return $this->GetNumRows($this->Query($sql));
						
			$this->Disconnect();
		
		} else {
			$this->ShowLastError(); return false;
		}	
	}


function listado_categoria(){
		
		$row = array();
		$this->open_db();
		if($this->IsConnected()){
			$sql = "SELECT id, descripcion FROM categorias where eliminado = 0 order by orden";
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

	
function FormatoFecha($fecha){
		//echo $fecha;
		if($fecha == "") return '';
		else return $fecha[8].$fecha[9].'/'.$fecha[5].$fecha[6].'/'.$fecha[0].$fecha[1].$fecha[2].$fecha[3];
	}


}
?>