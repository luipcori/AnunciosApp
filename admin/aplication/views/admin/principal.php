<?
session_start();
require_once('../../../system/clases/validate.php' );
$login = new validate(); 
$login->validar_sesion();

require_once('../../../system/clases/files.php' );
require_once('../../../system/clases/estructura.php' );
require_once('../../../aplication/controllers/menu.php' );
require_once('../../../aplication/controllers/barramenu.php' );

$carpetas = new files();
$general = new fdefi();
$estruc = new estructura();
$menu = new menu();
$BarraMenu = new BarraMenu();
include('funciones.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" dir="ltr" lang="es-es"><head>
  <!--meta http-equiv="content-type" content="text/html; charset=iso-8859-1"-->
  <meta http-equiv="content-type" content="text/html; charset=utf8">
  <title>Administrador de <?=$general->NomEmp?></title>
  <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">

	<script type="text/javascript" src="<?=$carpetas->dirjs()?>jquery-latest.min.js"></script>
	<script type="text/javascript" src="<?=$carpetas->dirjs()?>jquery.textarea.js"></script>
	<script type="text/javascript" src="<?=$carpetas->dirjs()?>mootools.js"></script>
	<script type="text/javascript" src="<?=$carpetas->dirjs()?>jquery-1.5.2.js"></script>
	<script type="text/javascript" src="<?=$carpetas->dirjs()?>menu.js"></script>
	<script type="text/javascript" src="<?=$carpetas->dirjs()?>index.js"></script>
    <script type="text/javascript" src="<?=$carpetas->dirjs()?>ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?=$carpetas->dirjs()?>funciones.js"></script>
  
    <link rel="stylesheet" href="<?=$carpetas->dircss()?>system.css" type="text/css">
    <!--link href="<?=$carpetas->dircss()?>login.css" rel="stylesheet" type="text/css"-->
    <link href="<?=$carpetas->dircss()?>general.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?=$carpetas->dircss()?>rounded.css">
    <link rel="stylesheet" type="text/css" href="<?=$carpetas->dircss()?>menu.css">
    <link rel="stylesheet" type="text/css" href="<?=$carpetas->dircss()?>icon.css">
    <!--link href="<?=$carpetas->dircss()?>template.css" rel="stylesheet" type="text/css"-->

</head>
<body>

	<div id="border-top" class="default"><div><div>
        		<span class="title">
				<?=$general->NomEmp?>
                </span>
                <div></div>
    </div></div></div>

                <div style=" position:absolute;margin-left:300px; margin-top:-30px" >
                <span style="font-family:Verdana, Geneva, sans-serif; font-size:14px; font-weight:bold">  <?=$general->NomEmpDes?> </span></div>

    <div id="header-box">

        <div id="module-status">
			<span class="inicio"><a href="/AnunciosApp/index.php">Vista</a></span>
			<span class="inicio"><a href="principal.php">Inicio</a></span>
            <span class="loggedin-users"><?=$login->nombre_usuario()?></span>
            <span class="clave"><a href="?opt=8cbbc409ec990f19c78c75bd1e06f215">[Cambiar clave]</a></span>
            <span class="logout"><a href="cerrar_session.php">Cerrar sesi&oacute;n</a></span>
        </div>
    


       <? $menu->CrearMenu();
               $menu->MenuHorizontal('Anuncios','',false,'VER_AVISOS');
					$menu->Item('Lista de Avisos','?opt=2838023a778dfaecdc212708f721b788','VER_AVISOS');
					$menu->SeparadorItem('VER_AVISOS');
				$menu->MenuHorizontalCerrar('VER_AVISOS');


                $menu->MenuHorizontal('Maestros','',false,'VER_MAESTRO');
					$menu->Item('Usuarios','?opt=c4ca4238a0b923820dcc509a6f75849b','VER_USUARIO');
					$menu->SeparadorItem('VER_USUARIO');
					$menu->Item('Categorias','?opt=6512bd43d9caa6e02c990b0a82652dca','VER_CATEGORIA');
					$menu->SeparadorItem('VER_CATEGORIA');
                 $menu->MenuHorizontalCerrar('VER_MAESTRO');
       	 
$menu->CerrarMenu();
?>

        <div class="clr"></div>
    </div>

    <div id="content-box">
		<div class="padding">
                <!--- CONTENIDO --->
            <?
                //echo $estruc->mostrar_contenido_medio($_GET['opt']);
                if($estruc->mostrar_contenido_medio($_GET['opt']) == 0) {
            ?>
                <table class="adminform">
                <tr>
                <td valign="top" width="55%">

                <div id="cpanel">
                </div>
                
                </td>
                </tr>
                </table>
              
            <? }?>

                <!--- CONTENIDO --->

    		<div class="clr"></div>
        
        </div>
	</div>

<div id="border-bottom"><div><div></div></div></div>


<div id="footer">
	<p class="copyright">
		<a href="<?=$general->PagWeb?>" target="_blank"><?=$general->PagWeb?></a>
		 Maestria UNJBG<br> 2015 -
         <a href="<?=$general->PagWeb?>" target="_blank" title="Diseño web"><?=$general->PagWeb?></a>
	</p>
</div>
<input type="hidden" name="usuario" id="usuario" value="<?=$_SESSION['usuario_']?>" />
</body>
</html>