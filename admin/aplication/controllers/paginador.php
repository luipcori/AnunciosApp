<?
require_once('../../../system/clases/paginator.class.php');
class paginador extends Paginator {

	function __construct() {
		}
	function inicializacion($nroReg){
		$this->Paginator();
		$this->items_total = $nroReg;//$num_rows[0];
		$this->mid_range = 9; // Number of pages to display. Must be odd and > 3
		$this->default_ipp = 10;
		//$this->ipp_array = array(10,25,50,100,'All');
		$this->paginate();
	}
	function mostrar_pag(){
		echo $this->display_pages();
		echo "<span class=\"\">".
		$this->display_jump_menu().$this->display_items_per_page()."</span>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"paginate\">Pag: $this->current_page de $this->num_pages</span>";
	}
	
}
?>