<?
class menu {
	function __construct() {
		}
	function CrearMenu(){
		echo '<div id="module-menu"><ul id="menu">';
	}
	function CerrarMenu(){
		echo '</ul></div>';
	}
	function MenuHorizontal($nom, $link, $band,$idmenu){
		if($this->TienePermiso($idmenu)){		
			echo '<li class="node"><a href="'.$link.'">'.$nom.'</a>';
			if($band) echo '<ul style="width: 146px;"></ul></li>';
			else echo '<ul style="width: 155px;">';
		}
	}
	function MenuHorizontalCerrar($idmenu){
		if($this->TienePermiso($idmenu)) echo '</ul></li>';
	}
	function Item($nom, $link,$idmenu){
		if($this->TienePermiso($idmenu)) echo '<li style="width: 155px;"><a class="icon-16-cpanel" href="'.$link.'">'.$nom.'</a></li>';
	}
	function SeparadorItem($idmenu){
		if($this->TienePermiso($idmenu)) echo '<li style="width: 155px;" class="separator"><span></span></li>';
	}
	function TienePermiso($men){
		
		//var_dump($_SESSION['permisos_']);
		$band = false;
		foreach($_SESSION['permisos_'] as $permiso) {
			if($permiso['nom_permiso'] == $men)	$band = true;
		}
		return $band;
	}
	
}
?>