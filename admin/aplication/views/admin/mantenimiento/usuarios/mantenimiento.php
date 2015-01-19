<?
require_once('../../../../models/dbusuario.php' );
$option = $_POST['option'];
//echo $_POST['option'];
$db = new dbusuario();
switch($option){
	case 'RI':{
						$data = array();
						$data[nom_tra] = $_POST['nom_tra'];
						$data[apep_tra] = $_POST['apep_tra'];
						$data[apem_tra] = $_POST['apem_tra'];
						$data[dir_tra] = $_POST['dir_tra'];
						$data[sexo_tra] = $_POST['sexo_tra'];
						$data[dni_tra] = $_POST['dni_tra'];
						$data[mail_tra] = $_POST['mail_tra'];
						$data[tel_tra] = $_POST['tel_tra'];

						$data[usuario] = $_POST['usuario'];
						$data[clave] = md5($_POST['clave']);
						$data[idperfil] = $_POST['idperfil'];
						
						$res = $db->ingresar($data);
						
						if ($res) $res = 8;
						else $res = 7;
						//exit();
						echo "<script>location.href= '../../principal.php?msn=".$res."&opt=c4ca4238a0b923820dcc509a6f75849b';</script>";
						break;
		}
	case 'RM':{
						$data = array();
						$id=$_POST['idInstancia'];
						$data[nom_tra] = $_POST['nom_tra'];
						$data[apep_tra] = $_POST['apep_tra'];
						$data[apem_tra] = $_POST['apem_tra'];
						$data[dir_tra] = $_POST['dir_tra'];
						$data[sexo_tra] = $_POST['sexo_tra'];
						$data[dni_tra] = $_POST['dni_tra'];
						$data[mail_tra] = $_POST['mail_tra'];
						$data[tel_tra] = $_POST['tel_tra'];

						$data[usuario] = $_POST['usuario'];
						$data[clave] = md5($_POST['clave']);
						$data[idperfil] = $_POST['idperfil'];

						$res = $db->editar($id,$data);
						$db->ShowLastError();
						if ($res) $res = 8;
						else $res = 7;
						//exit();
						echo "<script>location.href= '../../principal.php?msn=".$res."&opt=c4ca4238a0b923820dcc509a6f75849b';</script>";
						break;
		}

	case 'RE':{
						$id = $_POST['codigo'];
						//echo $id;
						//$dbUsuario = new db();
						$res = $db->eliminar($id);
						$db->ShowLastError();
						$db->lastsql;
						if ($res) $res = 8;
						else $res = 7;
						//exit();
						echo "<script>location.href= '../../principal.php?msn=".$res."&opt=c4ca4238a0b923820dcc509a6f75849b';</script>";
						break;
		}
	case 'RMCU':{
						$nom = $_POST['nom'];
						$apep = $_POST['apep'];
						//echo $id;
						//$dbUsuario = new db();
						$res = $db->CrearUsuario($nom, $apep);
						return $res;
						break;
		}
	case 'RMCUL':{
						$nom = $db->NomFiliacion($_POST['idFiliacion']);
						$apep = $db->ApepFiliacion($_POST['idFiliacion']);
						//echo  $nom.' - '.$apep;
						//echo $id;
						//$dbUsuario = new db();
						$res = $db->CrearUsuario($nom, $apep);
						return $res;
						break;
		}


}
?>