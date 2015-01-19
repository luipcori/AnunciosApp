<?
session_start();
//define('FPATH_BASE', dirname(__FILE__) );
require_once('../../../system/clases/files.php' );
require_once('../../../system/clases/validate.php' );

$userName = $_POST['username'];
$password = $_POST['passwd'];
$login = new validate();

$res = $login->logueo($userName,$password);

//			echo $_SESSION['usuario_'].'<br>';
//			echo	$_SESSION['nom_'].'<br>';
//			echo	$_SESSION['apep_'].'<br>';
//			echo	$_SESSION['apem_'].'<br>';
//			var_dump($_SESSION['permisos_']);


//echo $res;
//exit();
$login->route($res,$dir);
//echo $res;
//echo $userName.' - '.$password;
?>