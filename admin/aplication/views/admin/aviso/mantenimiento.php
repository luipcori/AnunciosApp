<?
session_start();
require_once('../../../models/dbaviso.php' );
function quitarChar($var1){
	$var1 = str_replace("'"," ",$var1);
	return $var1;
}
$option = $_POST['option'];
//echo $_POST['option'];
$db = new dbaviso();

switch($option){
	case 'RI':{
						$data = array();
						
						$data[titulo] = $_POST['titulo'];
						$data[categoria] = $_POST['idCategoria']; 
						
						$f = $_POST['fechaPub'];
						$data[fecha_pub] = $f[6].$f[7].$f[8].$f[9].'-'.$f[3].$f[4].'-'.$f[0].$f[1];
						
						$f = $_POST['fechaLimite']; 
						$data[fecha_limite] = $f[6].$f[7].$f[8].$f[9].'-'.$f[3].$f[4].'-'.$f[0].$f[1];
						$data[detalle] = $_POST['detalle']; 
						$data[imagen] = $_POST['ruta']; 
						$data[usuario] = $_SESSION['idUsuario_'];
						
				
                        
						$res = $db->ingresar($data);
						echo $db->ShowLastError();
						echo $db->lastsql;
						//echo $res;
					
						
						if ($res) $res = 8;
						else $res = 7;
						//exit();
						echo "<script>location.href= '../principal.php?msn=".$res."&opt=2838023a778dfaecdc212708f721b788';</script>";
						
						break;
		}
	case 'RM':{
						$data = array();
						$id=$_POST['idInstancia'];
						$data[titulo] = $_POST['titulo'];
						$data[categoria] = $_POST['idCategoria']; 
						
						$f = $_POST['fechaPub'];
						$data[fecha_pub] = $f[6].$f[7].$f[8].$f[9].'-'.$f[3].$f[4].'-'.$f[0].$f[1];
						
						$f = $_POST['fechaLimite']; 
						$data[fecha_limite] = $f[6].$f[7].$f[8].$f[9].'-'.$f[3].$f[4].'-'.$f[0].$f[1];
						$data[detalle] = $_POST['detalle']; 
						
						if($_POST['ruta'] <> "" ){
							$data[imagen] = $_POST['ruta']; 
						}
						$data[usuario] = $_SESSION['idUsuario_'];
						
						$data[fhmodificacion] = date('Y/m/d H:i:s');
						

						$res = $db->editar($id,$data);
						//echo $res;
						
						//$_SESSION['_codigo1_'] = $dbP->last_id;
						if ($res) $res = 8;
						else $res = 7;
						
						//exit();
						echo "<script>location.href= '../principal.php?msn=".$res."&opt=2838023a778dfaecdc212708f721b788';</script>";
						break;
		}



	case 'RE':{
						$id = $_POST['codigo'];

						$res = $db->eliminar($id);
						if ($res) $res = 8;
						else $res = 7;
						//exit();
						echo "<script>location.href= '../principal.php?msn=".$res."&opt=2838023a778dfaecdc212708f721b788';</script>";
						break;
		}

}
?>