<?
require_once('../../models/dbaviso.php' );
require_once('../../controllers/paginador.php' );
require_once('../../../system/clases/files.php' );
require_once('../../../aplication/controllers/barramenuicon.php' );
session_start();
$user = new dbaviso();
$carpetas = new files();
$dato = $_POST['dato'];
$pages = new paginador;
$pages->inicializacion($user->nro_registros($dato));
$BarraMenuIcon = new BarraMenuIcon();
$_SESSION['_codigo1_'] = '';
$_SESSION['_isReferenciado_'] = 0;
$_SESSION['_nro_referencias_'] = '';

?>
<script type="text/javascript" src="<?=$carpetas->dirjs()?>aviso.js"></script>
<?
if($_GET['page'] == "") $_GET['page'] = 1;

?>

<script>
function hilite(elem){
	elem.style.background = '#FFC';
}
function lowlite(elem){
	elem.style.background = '';
}
</script>


				<div id="toolbar-box">
   			   		<div class="t"><div class="t"><div class="t"></div></div></div>
            		<div class="m">

	                    <? $BarraMenuIcon->CrearMenuIcon();?>
							<? $BarraMenuIcon->CrearBoton('Nuevo','new','ING_AVISOS');?>
                            <? $BarraMenuIcon->CrearBoton('Editar','edit','EDIT_AVISOS');?>
                            <? $BarraMenuIcon->CrearBoton('Borrar','delete','ELI_AVISOS');?>
                            <? $BarraMenuIcon->CrearBoton('Cancelar','cancel','VER_AVISOS');?>
                        <? $BarraMenuIcon->CerrarMenuIcon();?>

					<div class="header icon-48-addedit"><?=strtoupper($edit)?>: [ VER ]</small></small></div>
                    <div id="mensaje-login" align="center"><? mensajes('1',$_GET['msn']);?></div>
					<div class="clr"></div>
				</div>
				
                <div class="b"><div class="b"><div class="b"></div></div></div>
  		
   				<div class="clr"></div><div class="clr"></div><br>
				
				
				
					<div class="t"><div class="t"><div class="t"></div></div></div>
                    
					<div class="m">
                      <form action="" method="post" name="frmListado" id="frmListado">
                       
                        <table>
                        <tbody>
                        <tr>
                            <td align="left" width="100%">Titulo:
                            <input name="dato" id="dato" class="text_area" type="text" value="<?=$dato?>">
                            <button onclick="submitbutton('search');">Buscar</button>
                            </td>
                            <td nowrap="nowrap">
	                           </td>
                        </tr>
                        </tbody>
                        </table>
    
                        <table class="adminlist">
                        <thead>
                        <tr align="center">
                            <th width="26">Nro</th>
                            <th width="35">Sel</th>
                            <th width="142">Titulo</th>
                            <th width="70">Categoria</th>
                            <th width="10">Fecha Publicacion</th>
                            <th width="10">Fecha Limite</th>
                            
                            
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                        <td colspan="14">
                         </td>
                        </tr>
                        </tfoot>
                        <tbody>
                       <? 
					   $iter = 1;
					  //var_dump($user->mostrar_registros($dato,$pages->limit));
					   if($user->mostrar_registros($dato,$pages->limit)){
						   foreach($user->mostrar_registros($dato,$pages->limit) as $fila){
						   ?> 
							<tr class="row<?=$iter%2?>">
								<td>&nbsp;&nbsp;<?
								//echo $pages->default_ipp.'<br>';
								echo (($_GET['page']-1) * $pages->default_ipp ) + $iter;
								$iter++;
								?></td>
								<td align="center">
                                <input type="radio" id="sel" name="sel" 
                                value="<?=$fila[id]?>" onClick="SeleccionarId(this)"> 
                                
                                </td>
								<td>&nbsp;&nbsp;<?=strtoupper($fila[titulo])?></td>
                                <td>&nbsp;&nbsp;<?=$fila[categoria]?></td>
                                <td>&nbsp;&nbsp;<?=$fila[fecha_pub]?></td>
								<td>&nbsp;&nbsp;<?=$fila[fecha_limite]?></td>
								
								
							</tr>
							<? }  
						}?>
                        </tbody>
                        </table>
                        <input type="hidden" name="option" id="option" value="">
                        <input type="hidden" name="codigo" id="codigo" value="" />
                        <input type="hidden" name="bandId" id="bandId" value="" />
                        </form>
        
                        <div class="clr"></div>
					
                    
                    <? 
					//
					?>
                    
                    <div align="right">
					<? 
					//echo $pages->display_pages();
					//echo "<span class=\"\">".
					//$pages->display_jump_menu().$pages->display_items_per_page()."</span>";
					//echo "&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"paginate\">Pag: $pages->current_page de $pages->num_pages</span>";
					$pages->mostrar_pag();
					?>
                    </div>
                    </div>
					<div class="b"><div class="b"><div class="b"></div></div></div>
   				</div>
				
            	<div class="clr"></div>
	            
				<div class="clr"></div>