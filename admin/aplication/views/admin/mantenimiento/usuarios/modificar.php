<?
require_once('../../../system/clases/files.php' );
require_once('../../models/dbusuario.php' );
//require_once('../../models/dboficina.php' );
$carpetas = new files();
//$ofici = new dboficina();
$instancia = new dbusuario();
$datos = array();
$id = $_POST['codigo'];
//echo $_POST['codigo'];


if($id == '') $acc = 'new'; else $acc = 'edit';
$datos = $instancia->buscar_item($id);

//$instancia->CrearArbol(0,'-->');
//var_dump($datos);
?>
<script type="text/javascript" src="<?=$carpetas->dirjs()?>usuarios.js"></script>

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
                    <td>DNI</td><td>:</td>
                    <td>
                    <input type="text" name="dni_tra" id="dni_tra" class="input" tabindex="1" 
                    size="15" maxlength="8" value="<?=$datos[dni_tra]?>">
                    <!--img src="<?=$carpetas->dirimage()?>icon-48-article-addOficina.png" border="0" onclick="BuscarPersona(this.value);"-->
                    </td>
                    </tr>

                    <tr>
                    <td>Nombre</td><td>:</td>
                    <td>
                    	<input type="text" name="nom_tra" id="nom_tra" class="input" 
                    	tabindex="2" size="35" maxlength="50" value="<?=$datos[nom_tra]?>">
                    </td>
                    </tr>
                    <tr>
                    <td>Ape. Paterno</td><td>:</td>
                    <td>
                    	<input type="text" name="apep_tra" id="apep_tra" class="input" 
                    	size="35" tabindex="10" maxlength="50" value="<?=$datos[apep_tra]?>"
                        onblur="CrearUsuario();">
                    </td>
                    </tr>

                    <tr>
                    <td>Ape. Materno</td><td>:</td>
                    <td>
                    	<input type="text" name="apem_tra" id="apem_tra" class="input" 
                    	size="35" tabindex="20" maxlength="50" value="<?=$datos[apem_tra]?>">
                    </td>
                    </tr>

                    <tr>
                    <td>Sexo</td><td>:</td>
                    <td>
                    Hombre<input type="radio" name="sexo_tra" id="sexo_tra" class="input" tabindex="40" 
                     value="1" <? if($datos['sexo_tra'] == 1) echo 'checked="checked"';?> >
                     
                    Mujer<input type="radio" name="sexo_tra" id="sexo_tra" class="input" tabindex="50" 
                     value="2" <? if($datos['sexo_tra'] == 2) echo 'checked="checked"';?>>
                     </td>
                    </tr>

                    <tr>
                    <td>Dirección</td><td>:</td>
                    <td>
                    <input type="text" name="dir_tra" id="dir_tra" class="input" tabindex="62" 
                    size="45" maxlength="45" value="<?=$datos[dir_tra]?>"></td>
                    </tr>


                    <tr>
                    <td>Correo</td><td>:</td>
                    <td>
                    <input type="text" name="mail_tra" id="mail_tra" class="input" tabindex="64" 
                    size="50" maxlength="50" value="<?=$datos[mail_tra]?>"></td>
                    </tr>

                    <tr>
                    <td>Teléfono</td>
                    <td>:</td>
                    <td>
                    <input type="text" name="tel_tra" id="tel_tra" class="input" tabindex="66" 
                    size="50" maxlength="50" value="<?=$datos[tel_tra]?>"></td>
                    </tr>

                    <tr>
                    <td>Usuario</td>
                    <td>:</td>
                    <td>
                    <input type="text" name="usuario" id="usuario" class="input" tabindex="68" 
                    size="25" maxlength="30" value="<?=$datos[usuario]?>" readonly="readonly"></td>
                    </tr>

                    <tr>
                    <td>Clave</td>
                    <td>:</td>
                    <td>
                    <input type="password" name="clave" id="clave" class="input" tabindex="70" 
                    size="25" maxlength="50" value="<?=$datos[clave]?>"></td>
                    </tr>
                    <tr>
                    <td>Repetir Clave</td>
                    <td>:</td>
                    <td>
                    <input type="password" name="clave1" id="clave1" class="input" tabindex="72" 
                    size="25" maxlength="50" value=""></td>
                    </tr>


					<tr>
                    <td>Perfil</td><td>:</td>
                    <td>
					
                    <select id="idperfil"  name="idperfil" tabindex="74">
                    <option value="0">Seleccione ... </option>
					<?
                    foreach($instancia->listado_perfil() as $perfil){
						if($datos[idperfil] == $perfil[id]) $sel = 'selected="selected"'; else $sel = '';
						echo '<option value="'.$perfil[id].'" '.$sel.'>'.$perfil[nom_per].'</option>';
						}
					?>
                    </select>
                    
                    </td>
                    </tr>


                    <? if($id != ''){?>
					<td>Estado</td><td>:</td>
                    <td>Activo<input type="radio" name="estado" id="estado" class="input" 
                    tabindex="76" <? if($datos[estado] == 1) echo 'checked="checked"';?> value="1" >&nbsp;&nbsp;Inactivo
                    <input type="radio" name="estado" id="estado" class="input" 
                    tabindex="76" <? if($datos[estado] == 0) echo 'checked="checked"';?> value="0" >
                    </td>
                    </tr>
                    
					<? }?>
                    
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

