<?
require_once('../../models/dbcategoria.php' );
require_once('../../controllers/paginador.php' );
require_once('../../../system/clases/files.php' );
$fila = new dbcategoria();
$carpetas = new files();

$pages = new paginador;
$dato = $_POST['dato'];
$pages->inicializacion($fila->nro_registros($dato));
?>
<script type="text/javascript" src="<?=$carpetas->dirjs()?>categoria.js"></script>
<?
if($_GET['page'] == "") $_GET['page'] = 1;

//echo $pages->limit;
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
						<div class="toolbar" id="toolbar">
						<table class="toolbar"><tbody>
                        <tr>
							<td class="button" id="toolbar-new">
                            	<a href="#" onClick="submitbutton('new')" class="toolbar">
                                <span class="icon-32-new" title="Nuevo"></span>Nuevo</a>
							</td>

							<td class="button" id="toolbar-edit">
								<a href="#" onclick="submitbutton('edit')" class="toolbar">
                                <span class="icon-32-edit" title="Editar"></span>Editar</a>
                            </td>


							<td class="button" id="toolbar-delete">
								<a href="#" onclick="submitbutton('delete')" class="toolbar">
                                <span class="icon-32-delete" title="Borrar"></span>Borrar</a>
                            </td>

   							<td class="button" id="toolbar-cancel">
								<a href="#" onclick="submitbutton('cancel')" class="toolbar">
                                <span class="icon-32-cancel" title="Cancelar"></span>Cancelar</a>
							</td>

                        </tr>
                        </tbody></table>
					</div>
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
                            <td align="left" width="100%">Descripcion:
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
                            <th width="142">Descripcion</th>

                            
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
					  
					   if($fila->mostrar_registros($dato,$pages->limit)){
						   //var_dump($fila->mostrar_registros($dato,$pages->limit));
						   foreach($fila->mostrar_registros($dato,$pages->limit) as $fila){
						   ?> 
							<tr class="row<?=$iter%2?>">
								<td>&nbsp;&nbsp;<?
								//echo $pages->default_ipp.'<br>';
								echo (($_GET['page']-1) * $pages->default_ipp ) + $iter;
								$iter++;
								?></td>
								<td align="center"><input type="radio" id="sel" name="sel" 
                                value="<?=$fila[id]?>" onClick="SeleccionarId(this)"></td>
								<td>&nbsp;&nbsp;<?=$fila[descripcion]?></td>

								
							</tr>
							<? }  
						}?>
                        </tbody>
                        </table>
                        <input type="hidden" name="option" id="option" value="">
                        <input type="hidden" name="codigo" id="codigo" value="" />
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