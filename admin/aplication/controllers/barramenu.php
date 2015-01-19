<?
class BarraMenu {
	function __construct() {
		}
	function CrearMenu(){
		echo '<div id="BarMenu">';
	}
	function CerrarMenu(){
		echo '</div>';
	}
	function AgregarBoton($img, $link, $alt,$idmenu){
		if($this->TienePermiso($idmenu)){
			echo '<div class="icon">';
            echo '<a href="?'.$link.'" alt="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"></a>';
            echo '</div>';
		}
	}
	function Separador($idmenu){
		if($this->TienePermiso($idmenu)){
			echo '<div class="icon">&nbsp;&nbsp;</div>';
		}
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