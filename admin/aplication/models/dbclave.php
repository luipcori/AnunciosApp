<?
if (is_file('../../../system/clases/class.dbutil.inc.php')) require_once('../../../system/clases/class.dbutil.inc.php');
else require_once ('../../../../../system/clases/class.dbutil.inc.php');

class dbclave extends cDB {

	function __construct() {
		}
	function open_db(){
		if(is_file('../../../../../config/config.php')) require_once('../../../../../config/config.php');
		$datos = new fdefi();
		//$this->Connect("127.0.0.1", "administracion", "root", "123456");
		$this->Connect($datos->host, $datos->database, $datos->user, $datos->passwd);
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


}
?>