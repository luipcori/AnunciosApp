<?
session_start();
require_once('../../../system/clases/validate.php' );
$login = new validate();
$login->cerrar_session();
?>