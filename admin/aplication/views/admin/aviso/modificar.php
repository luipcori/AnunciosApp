<?
require_once('../../../system/clases/files.php' );
require_once('../../models/dbaviso.php' );
session_start();
$carpetas = new files();
//$ofici = new dboficina();
$instancia = new dbaviso();
$datos = array();
$id = $_POST['codigo'];
echo $_POST['codigo'];
//$idPago = $_POST['idPago'];

if($id == '') $acc = 'new'; else $acc = 'edit';
$datos = $instancia->buscar_item($id);

//$instancia->CrearArbol(0,'-->');
//var_dump($datos);
?>
<script type="text/javascript" src="<?=$carpetas->dirjs()?>aviso.js"></script>

        <div id="toolbar-box"><div class="t"><div class="t"><div class="t"></div></div></div>
        
        <div class="m">
        	
            <div class="toolbar" id="toolbar">
            <table class="toolbar"><tbody>
                    <tr>
					<td class="button" id="toolbar-save">
                        <a href="#" onclick="javascript: ver_mod('<?=$acc?>','<?=$edit?>')" class="toolbar">
                        <span class="icon-32-save" title="Guardar"></span>Guardar</a>
					</td>

                    <td class="button" id="toolbar-cancel">
                        <a href="#" onclick="javascript: ver_mod('cancel','<?=$edit?>')" class="toolbar">
                        <span class="icon-32-cancel" title="Cancelar"> </span>Cancelar</a>
                    </td>

				</tr></tbody>
         	 	</table>
			</div>
			
            <div class="header icon-48-addedit"><?=strtoupper($edit)?>: [ <?=strtoupper($editAccion)?> ]</div>
			<div class="clr"></div>
		</div>
    	
        <div class="b"><div class="b"><div class="b"></div></div></div>
	</div>



<div class="clr"></div>

<div id="element-box">
	<div class="t"><div class="t"><div class="t"></div></div></div>
	<div class="m">

	    <form action="mantenimiento.php" method="post" name="frmMod" id="frmMod">
        <table border="0" cellpadding="0" cellspacing="0" width="600" align="center">
            <tbody>
            <tr>
            <td valign="top">
                <table class="adminform">
                    <tbody>
                    <tr>
                    <td>Tiutlo</td>
                    <td>:</td>
                    <td>
                    <input type="text" name="titulo" id="titulo" class="input" size="100" tabindex="1" maxlength="100" value="<?=$datos[titulo]?>" >
                    
                    </td>
                    </tr>

                    <tr>
                      <td>Categoria</td>
                      <td>:</td>
                      <td><select name="idCategoria" id="idCategoria" tabindex="130">
                        <option value="0">Seleccione ... </option>
                        <? 
						foreach($instancia->listado_categoria() as $ven){
							if($ven[id] == $datos[categoria])	
								echo '<option value="'.$ven[id].'" selected="selected">'.$ven[descripcion].'</option>';
							else 
								echo '<option value="'.$ven[id].'">'.$ven[descripcion].'</option>';
						}
						
					 ?>
                      </select></td>
                    </tr>
                    <tr>
                    <td>Fecha de Publicacion</td>
                    <td>:</td>
                    <td>
                    <? include('../../../plugin/calendar/calendario1.php'); ?>
                   	<script>
						jQuery(function() {
							jQuery( "#fechaPub" ).datepicker({
										showOn: "button",
										buttonImage: "../images/calendar.gif",
										buttonImageOnly: true,
										changeYear: true,
										dateFormat: 'dd/mm/yy'
							});
						});
						</script>
					
                    <input type="text" name="fechaPub" id="fechaPub" class="input" 
                    tabindex="9" size="10" maxlength="10" 
                    value="<? if($datos[fecha_pub] == "") echo date('d/m/Y'); else echo $instancia->FormatoFecha($datos[fecha_pub])?>" 
                    readonly="readonly">	
                        
                    </td>
                    </tr>

                    <tr>
                    <td>Fecha Limite</td>
                    <td>:</td>
                    <td>
                    <? include('../../../plugin/calendar/calendario1.php'); ?>
                   	<script>
						jQuery(function() {
							jQuery( "#fechaLimite" ).datepicker({
										showOn: "button",
										buttonImage: "../images/calendar.gif",
										buttonImageOnly: true,
										changeYear: true,
										dateFormat: 'dd/mm/yy'
							});
						});
						</script>
					
                    <input type="text" name="fechaLimite" id="fechaLimite" class="input" 
                    tabindex="9" size="10" maxlength="10" 
                    value="<? if($datos[fecha_limite] == "") echo date('d/m/Y'); else echo $instancia->FormatoFecha($datos[fecha_limite])?>" 
                    readonly="readonly">	

                    </td>

                    </tr>

                                       
                    <tr>
                    <td>Detalle</td><td>:</td>
                    <td>
                    	<textarea name="detalle" id="detalle" class="input" cols="50" rows="5" tabindex="140"><?=$datos[detalle]?></textarea>
                        <script>CKEDITOR.replace('detalle'); </script>
                    </td>
                    </tr>
                    
                    <tr>
                    <td>Imagen</td>
                    <td>:</td>
                    <td>
                    	<? 
					$_SESSION['ruta_upload'] = 'test';
					include('subir_archivo/subir.php');?>                   
                    <? if($datos[imagen] <> "") {
						echo '<a href="subir_archivo/test/'.$datos[imagen].'" target="_blank">'.$datos[imagen].'</a>';
						echo '<input type="checkbox" name="borrarArchivo"  />Eliminar';
					}
					?>
                    </td>

                    </tr>
                    
                    </table>
                    
               
            </td>
            </tr>
            </tbody>
        </table>
        <div id="mensaje-login" align="center"><? mensajes('1',$_GET['msn']);?></div>
        <input type="hidden" name="option" id="option" />
        <input type="hidden" name="idInstancia" id="idInstancia" value="<?=$id?>" />
	</form>

    </div>
</div>

<div id="border-bottom"><div><div></div></div></div>
<div id="idRes" style="position:absolute; top:200px; left:400px;"></div>	


