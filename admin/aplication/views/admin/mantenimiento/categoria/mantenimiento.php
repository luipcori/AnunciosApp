<?
require_once('../../../../models/dbcategoria.php' );
$option = $_POST['option'];
//echo $_POST['option'];
$db = new dbcategoria();
switch($option){
	case 'RI':{
						$data = array();
						

						$data[descripcion] = $_POST['descripcion'];
						
						$res = $db->ingresar($data);
						
						if ($res) $res = 8;
						else $res = 7;
						
						//exit();
						echo "<script>location.href= '../../principal.php?msn=".$res."&opt=6512bd43d9caa6e02c990b0a82652dca';</script>";
						break;
		}
	case 'RM':{
						$data = array();
						

						$id=$_POST['idInstancia'];
						$data[descripcion] = $_POST['descripcion'];
						
						$res = $db->editar($id,$data);
						
						$db->ShowLastError();
						if ($res) $res = 8;
						else $res = 7;
						//exit();
						echo "<script>location.href= '../../principal.php?msn=".$res."&opt=6512bd43d9caa6e02c990b0a82652dca';</script>";
						break;
		}

	case 'RE':{
						$id = $_POST['codigo'];
						
						
						$res = $db->eliminar($id);
						
						if ($res) $res = 8;
						else $res = 7;
						//exit();
						echo "<script>location.href= '../../principal.php?msn=".$res."&opt=6512bd43d9caa6e02c990b0a82652dca';</script>";
						break;
		}


}
?>