<?
class BarraMenuIcon {
	function __construct() {
		}
	function CrearMenuIcon(){
		echo '<div class="toolbar" id="toolbar">';
		echo '<table class="toolbar"><tbody>';
        echo '<tr>';
	}
	function CerrarMenuIcon(){
		echo '</tr>';
        echo '</tbody></table>';
		echo '</div>';
	}
	function CrearBoton($nom, $tipo,$idmenu){
		if($this->TienePermiso($idmenu)){
			echo '<td class="button" id="toolbar-'.$tipo.'">';
            echo '<a href="#" onClick="submitbutton('."'".$tipo."'".')" class="toolbar">';
            echo '<span class="icon-32-'.$tipo.'" title="'.$nom.'"></span>'.$nom.'</a>';
			echo '</td>';
		}
	}

	function SeparadorItem($idmenu){
		if($this->TienePermiso($idmenu)) echo '<td>&nbsp;&nbsp;</td>';
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