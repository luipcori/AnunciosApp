<?
if (is_file('admin/config/config.php')) require_once('admin/config/config.php');
if (is_file('config/config.php')) require_once('config/config.php');
if (is_file('/config/config.php')) require_once('/config/config.php');
if (is_file('../config/config.php')) require_once('../config/config.php');
if (is_file('../../config/config.php')) require_once('../../config/config.php');
if (is_file('../../../config/config.php')) require_once('../../../config/config.php');


class files extends fdefi{
	
	//public $im = 'al/las';
	
	function __construct() {
		}
	function dirimage(){
		return $this->BaseWeb.'/aplication/views/images/';
	}	
	function dirjs(){
		return $this->BaseWeb.'/aplication/views/js/';
	}	
	function dircss(){
		return $this->BaseWeb.'/aplication/views/css/';
	}	
	function DirImgLogin(){
		return $this->BaseWeb.'/aplication/views/images/login/';
	}	
	
}
?>