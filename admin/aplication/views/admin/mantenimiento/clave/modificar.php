<?
session_start();
require_once('../../../system/clases/files.php' );
//require_once('../../models/dbclave.php' );
//require_once('../../models/dboficina.php' );
$carpetas = new files();
//$ofici = new dboficina();
//$instancia = new dbclave();
//$datos = array();
$id = $_SESSION['idUsuario_'];
//echo $_POST['codigo'];


//$instancia->CrearArbol(0,'-->');
//var_dump($datos);
?>
<script type="text/javascript" src="<?=$carpetas->dirjs()?>clave.js"></script>

        <div id="toolbar-box"><div class="t"><div class="t"><div class="t"></div></div></div>
        
        <div class="m">
        	
            <div class="toolbar" id="toolbar">
            <table class="toolbar"><tbody>
                    <tr>
					<td class="button" id="toolbar-save">
                        <a href="#" onclick="javascript: ver_mod('edit','<?=$edit?>')" class="toolbar">
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
                    <td>Nueva Clave</td>
                    <td>:</td>
                    <td>
                    	<input type="hidden" name="idUsuario" id="idUsuario" value="<?=$id?>"  />
                        <input type="password" name="claveNueva" id="claveNueva" class="input" 
                    	size="15" tabindex="3" maxlength="15" value="" >
                    </td>
                    </tr>

                    <tr>
                    <td>Repita la Nueva Clave</td>
                    <td>:</td>
                    <td>
                    	<input type="password" name="claveNueva1" id="claveNueva1" class="input" 
                    	size="15" tabindex="4" maxlength="15" value="">
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

