<?
require_once('../../../../models/dbclave.php' );
$option = $_POST['option'];
//echo $_POST['option'];
$db = new dbclave();
switch($option){

	case 'RM':{
						$data = array();
						$id=$_POST['idUsuario'];
						//echo $id;		
						
						$data[clave] = md5($_POST['claveNueva']);

						$res = $db->editar($id,$data);
						$db->ShowLastError();
						if ($res) $res = 8;
						else $res = 7;
						//exit();
						echo "<script>location.href= '../../principal.php?msn=".$res."&opt=82c420d928d4bf8ce0ff21c19b371514';</script>";
						break;
		}


}
?>