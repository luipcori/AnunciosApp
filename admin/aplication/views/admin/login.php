<? include('funciones.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" dir="ltr" lang="es-es"><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Administradorde <?=$general->NomEmp?></title>
  <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
  <script type="text/javascript" src="<?=$carpetas->dirjs()?>mootools.js"></script>
<link rel="stylesheet" href="<?=$carpetas->dircss()?>system.css" type="text/css">
<link href="<?=$carpetas->dircss()?>login.css" rel="stylesheet" type="text/css">
<link href="<?=$carpetas->dircss()?>general.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=$carpetas->dircss()?>rounded.css">

<script language="javascript" type="text/javascript">
	function setFocus() {
		document.login.username.select();
		document.login.username.focus();
	}
</script>
</head>
<body onload="javascript:setFocus()">
	<div id="border-top" class="default">
		<div>        <div><span class="title"><?=$general->NomEmp?></span></div>
        </div>
    </div>
	
    
    <div id="content-box">
		<div class="padding">
			<div id="element-box" class="login">
				<div class="t">
					<div class="t">
						<div class="t"></div>
					</div>
				</div>
				<div class="m"><h1>Panel de Administración <?=$general->NomEmp?></h1>
				<div id="section-box">
					<div class="t">
						<div class="t">
							<div class="t"></div>
		 				</div>
	 			</div>
	
    		<div class="m">
			<form action="validate.php" method="post" name="login" id="form-login" style="clear: both;">
				<p id="form-login-username">
                <label for="modlgn_username">Usuario</label>
                <input name="username" id="modlgn_username" class="inputbox" size="15" type="text">
                </p>

				<p id="form-login-password">
				<label for="modlgn_passwd">Contraseña</label>
				<input name="passwd" id="modlgn_passwd" class="inputbox" size="15" type="password">
				</p>
		
                <div class="button_holder">
                    <div class="button1">
                        <div class="next">
                            <a onclick="login.submit();">Ingreso</a>
            
                        </div>
                    </div>
                </div>
                <div class="clr"></div>
        
                <input style="border: 0; padding: 0; margin: 0; width: 0px; height: 0px;" value="Ingreso" type="submit">
                <input name="option" value="com_login" type="hidden">
                <input name="task" value="login" type="hidden">
                
                <input name="2591b805d6de10a3a426e6e6fa6a2cac" value="1" type="hidden"></form>
                <div class="clr"></div>
        </div>
    
        <div class="b">
            <div class="b">
                    <div class="b"></div>
            </div>
            </div>
        </div>
            
                        
        <div id="lock"></div>
        <div class="clr"></div>
        </div>
    
        <div class="b">
            <div class="b">
                <div class="b"></div>
            </div>
        
        </div>
        <div id="mensaje-login"><? mensajes('1',$_GET['opt']);?></div>	
        </div>
	
    
    		<noscript>
				¡Advertencia! JavaScript debe estar habilitado para un correcto funcionamiento de la Administración			</noscript>
			<div class="clr"></div>
    </div>
	</div>
	<div id="border-bottom"><div><div></div></div>
</div>

<div id="footer">
	<p class="copyright">
		<a href="<?=$general->PagWeb?>" target="_blank"><?=$general->PagWeb?></a>
		 Todos los derechos reservados.		<br> 2012 - 
         <a href="<?=$general->PagWeb?>" target="_blank" title="Diseño web"><?=$general->PagWeb?></a>
	</p>
</div>


</body>
</html>