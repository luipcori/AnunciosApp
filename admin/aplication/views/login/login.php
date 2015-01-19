<? include('funciones.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Administrador de <?=$general->NomEmp?></title>

<link rel="stylesheet" href="<?=$carpetas->dircss()?>login.css" type="text/css">
<script type="text/javascript" src="<?=$carpetas->dirjs()?>jquery-1.5.2.js"></script>
<script type="text/javascript" src="<?=$carpetas->dirjs()?>funciones.js"></script>
</head>
<body>



<div id="medio">
<form name="login" action="../login/validate.php" method="post">
<table border="0" cellpadding="0" cellspacing="0" height="470" width="770">
  <tbody>
  <tr>
	<td background="<?=$carpetas->DirImgLogin()?>fi01.png" height="30" width="30">&nbsp;</td>
    <td background="<?=$carpetas->DirImgLogin()?>fi02.png">
    	
    </td>
    <td background="<?=$carpetas->DirImgLogin()?>fi03.png" height="30" width="30">&nbsp;</td>
  </tr>
  <tr>
    <td background="<?=$carpetas->DirImgLogin()?>fi04.png">&nbsp;</td>
    <td align="left" background="<?=$carpetas->DirImgLogin()?>fi05.png" height="410" valign="top" width="710">
    	<table border="0" cellpadding="0" cellspacing="0" height="401" width="710">
			<tbody>
            <tr>
        		<td colspan="3" height="20">&nbsp;</td>
        	</tr>
      		<tr>
        		<td colspan="3" align="left" height="180" valign="top">
					<div style="position:absolute; margin-top:-1px; left:5px; ">
                        <div width="270" height="180" style="position:absolute; margin-top:0px; left:0px; ">
                            
                        </div>
                        <div width="270" height="180" style="position:absolute; margin-top:20px; left:51px; top: 3px; width: 667px;">
                            <!--img src="<?=$carpetas->DirImgLogin()?>cha02.png"-->				
                            <font style=" font-family:Verdana, Geneva, sans-serif; color:#F00; font-size:26; font-weight:bold; margin-left:150px">UNIVERSIDAD NACIONAL JORGE BASADRE GRHOMANN</font><br>
                             <span class="style3" style="margin-left:455px">GESTION DE ANUNCIOS</span><br>
                        </div>
                        <div width="110" height="110" style="position:absolute; top: -35px; left: 444px; display:none; ">
                            <img src="<?=$carpetas->DirImgLogin()?>logohch.png" height="110" width="110">        
                  </div> 
                        <div width="186" height="44" style="position:absolute; top: 11px; left: 559px; display:none; ">
                            <img src="<?=$carpetas->DirImgLogin()?>hch.png" height="44" width="186">        
                        </div>                
        
						<table background="<?=$carpetas->DirImgLogin()?>l01.png" border="0" cellpadding="0" cellspacing="0" height="180" width="760">
                        <tbody>
                        <tr>
                            <td width="254">&nbsp;</td>
                            <td width="253">&nbsp;</td>
                            <td height="60" width="253">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="254">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td height="60" width="253">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="right" valign="middle" width="253">
                                

                            </td>
                        </tr>
                        </tbody>
                    </table>
       
					</div>
        		</td>
        	</tr>
      		<tr>
        		<td colspan="3" height="42">
                	<div align="right">
                    	<span class="style1"></span>				
                    </div>
                </td>
			</tr>
			<tr>
        		<td align="left" height="168" valign="middle" width="250">
                	<table border="0" cellpadding="0" cellspacing="0" height="140" width="250">
          			<tbody>
                    <tr>
            			<td background="<?=$carpetas->DirImgLogin()?>for01.png" height="20" width="20">&nbsp;</td>
            			<td background="<?=$carpetas->DirImgLogin()?>for02.png">&nbsp;</td>
            			<td background="<?=$carpetas->DirImgLogin()?>for03.png" height="20" width="20">&nbsp;</td>
          			</tr>
          			<tr>
            		<td background="<?=$carpetas->DirImgLogin()?>for04.png">&nbsp;</td>
            		<td align="center" background="<?=$carpetas->DirImgLogin()?>for05.png" height="100" valign="middle" width="210">
              			<table border="0" cellpadding="0" cellspacing="0" height="100" width="210">
                		<tbody>
                        <tr>
                  			<td colspan="3" class="style4" align="left" height="20" valign="top">Ingreso de Usuario</td>
                  		</tr>
                		<tr>
                  			<td class="style3" height="25" width="63">Usuario</td>
                  			<td colspan="2"><label><input name="username" class="style5" size="15" type="text"></label></td>
                  		</tr>
                		<tr>
                  			<td class="style3" height="25">Password</td>
							<td colspan="2"><input name="passwd" class="style5" size="15" type="password"></td>
                  		</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td align="right" valign="bottom" width="125">
                            	<label><input name="Enviar" id="Enviar" value="entrar" type="submit"></label>
                            </td>
                  			<td width="22">&nbsp;</td>
                		</tr>
              			</tbody>
                        </table>
                     
            		</td>
            		<td background="<?=$carpetas->DirImgLogin()?>for06.png">&nbsp;</td>
          		</tr>
          		<tr>
            		<td background="<?=$carpetas->DirImgLogin()?>for07.png" height="20" width="20">&nbsp;</td>
            		<td background="<?=$carpetas->DirImgLogin()?>for08.png">
                    	<div id="mensaje-login"><? mensajes('1',$_GET['opt']);?></div>	
                    </td>
            		<td background="<?=$carpetas->DirImgLogin()?>for09.png" height="20" width="20">&nbsp;</td>
          		</tr>
        		</tbody>
                </table>
			</td>
        	<td align="left" valign="middle" width="230">
				<div width="230" height="90" style="position:absolute;  margin-top:-40px; "></div>
        	</td>
        	<td align="center" valign="middle" width="230">
          		<div width="240" height="168" style="position:relative; margin-top:-3px; left:20px;">
                	<img src="<?=$carpetas->DirImgLogin()?>chika.png" height="168" width="240">
                </div>
        	</td>
      	</tr>
		</tbody>
        </table>
	</td>
    <td background="<?=$carpetas->DirImgLogin()?>fi06.png">&nbsp;</td>
</tr>
<tr>
	<td background="<?=$carpetas->DirImgLogin()?>fi07.png" height="30" width="30">&nbsp;</td>
    <td class="style2" align="left" background="<?=$carpetas->DirImgLogin()?>fi08.png" valign="top">
    	UNJBG © 2015 - Derechos Reservados  
		Tacna –Perú  www.unjbg.edu.pe
    </td>
    <td background="<?=$carpetas->DirImgLogin()?>fi09.png" height="30" width="30">&nbsp;</td>
</tr>
</tbody>
</table>
</form>
</div>
</div>
</body>
</html>