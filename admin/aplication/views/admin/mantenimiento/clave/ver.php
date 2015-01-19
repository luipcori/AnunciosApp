<?
require_once('../../../system/clases/files.php' );
$carpetas = new files();
?>

				<div id="toolbar-box">
   			   		<div class="t"><div class="t"><div class="t"></div></div></div>
            		<div class="m">



					<div class="header icon-48-addedit"><?=strtoupper($edit)?>: [ VER ]</small></small></div>
                    <div id="mensaje-login" align="center">
                    
                    </div>
					<div class="clr"></div>
				</div>
				
                <div class="b"><div class="b"><div class="b"></div></div></div>
  		
   				<div class="clr"></div><div class="clr"></div><br>
				
				
				
					<div class="t"><div class="t"><div class="t"></div></div></div>
                    
					<div class="m">
                          
                        <table>
                        <tbody>
                        <tr>
                            <td align="left" width="100%">
                            <font color="#FF0000">
                            <center>
                            <? if ($_GET['msn'] == 8) echo 'Contraseña cambiado con Exito!!!';?>
                            <? if ($_GET['msn'] == 7) echo ' La acci&oacute;n no se realiz&oacute;, vuelva a intentarlo!!!';?>
                            </center>
                            </font>
                            </td>
                            <td nowrap="nowrap">
	                           </td>
                        </tr>
                        </tbody>
                        </table>
    


        
                        <div class="clr"></div>
					

                    <div align="right">

                    </div>
                    </div>
					<div class="b"><div class="b"><div class="b"></div></div></div>
   				</div>
				
            	<div class="clr"></div>
	            
				<div class="clr"></div>