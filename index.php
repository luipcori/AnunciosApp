<?php
require_once('admin/system/clases/files.php' );
require_once('admin/system/clases/estructura.php' );
require_once('admin/aplication/controllers/menu.php' );
require_once('admin/aplication/controllers/barramenu.php' );
$carpetas = new files();
$general = new fdefi();
$estruc = new estructura();
$menu = new menu();
$BarraMenu = new BarraMenu();
include('admin/aplication/views/admin/funciones.php');
include('require/cn.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" dir="ltr" lang="es-es">

<head>
  <!--meta http-equiv="content-type" content="text/html; charset=iso-8859-1"-->
  <meta http-equiv="content-type" content="text/html; charset=utf8">
  <title><?=$general->NomEmp?></title>
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

<br class="clearfloat" />

</div>

    <link href="css/stylo.css" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" />

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.1.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#1, #2, #3").lavaLamp({
            fx: "backout",
            speed: 700,
            click: function(event, menuItem) {
                return false;
            }
        });
    });
</script>

<style type="text/css">

<!--

.Estilo3 {color: #003300; font-weight: bold; font-size: 12px; }
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000000; }
.Estilo15 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; color: #333333; font-weight: bold; }
.Estilo155 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; color: #333333; }
.Estilo16 {	font-size: 20px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->

</style>


</head>

<body class="twoColFixRtHdr">



	<div id="border-top" class="default"><div><div>
        		<span class="title">
				<?=$general->NomEmp?>
                </span>
                <div></div>
    </div></div></div>

    <div style=" position:absolute;margin-left:300px; margin-top:-30px" >
    <span style="font-family:Verdana, Geneva, sans-serif; font-size:14px; font-weight:bold">  <?=$general->NomEmpDes?> </span></div>

    <div id="content-box">
    <div class="padding">

    <div id="container">

      <div id="mainContent">

<?php include ("includes/barIzq.php"); ?>

<h2 class="vert-one">Mostrando datos de :: ANUNCIOS ::  </h2>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
                    <td align="center" bgcolor="#4e7fd1" class="Estilo15">CATEGORIA</td>
                    <td align="center" height="25" bgcolor="#4e7fd1" class="Estilo15">TITUTLO</td>
                    <td align="center" bgcolor="#4e7fd1"><span class="Estilo15">DETALLE DEL ANUNCIO</span></td>
                    <td align="center" bgcolor="#4e7fd1" class="Estilo15">REGISTRADO POR</td>
                    <td align="center" bgcolor="#4e7fd1" class="Estilo155"><p class="Estilo15">F. REGISTRO / F. LIMITE</p></td>
                    <td align="center" bgcolor="#4e7fd1"  class="Estilo15">IMAGEN</td>
                  </tr>
                  <?
$hoy=date("Ymd");

$query = "SELECT anu.id, anu.categoria, anu.titulo, anu.detalle, anu.usuario, anu.imagen, anu.fecha_pub, anu.fecha_limite, cat.id, cat.descripcion, user.usuario
FROM anuncios as anu left join categorias as cat on anu.categoria = cat.id left join usuario as user on anu.usuario = user.id
WHERE anu.fecha_limite>'$hoy'
ORDER BY anu.categoria ASC";

							$rs = mysql_query($query);
							  if(mysql_affected_rows() > 0)
							  {
									$i = 0;
									while($fila = mysql_fetch_array($rs)){// inicia el peque&ntilde;o
									$id =$fila[0];
				?>

                    <tr style="background-color:#ffffff" onMouseOver="this.style.backgroundColor = '#F0FFF0'" onMouseOut="this.style.backgroundColor = '#ffffff'">
                    <td width="110" height="30"><div align="left"><img src="img/ba.jpg" width="2" height="18" border="0" />    <?=$fila[9]?>                   </div>
                   </td>
                    <td width="110" height="30">
                    <div align="left"> <?=$fila[2]?></div></td>
                    <td width="235"><div align="left">
					 <a href="#" onclick="window.open('../AnunciosApp/popup.php?id=<?=$fila[0]?>','popup','width=520,height=620')">
					<?=$fila[3]?>
                    </a>
                    </div></td>
                    <td width="70"  height="30">
                      <div align="right"><?=$fila[10]?></div></td>
                    <td width="96" height="30">
                        <div align="right"><?=$fila[6] . "<br>".$fila[7]?></div>                  </td>
                    <td width="80"   height="30">
                    <div align="right"><img src="../AnunciosApp/admin/aplication/views/admin/subir_archivo/test/<?=$fila[5]?>" alt="<?=$fila[1]?>" width="163" height="115" border="0"/></div></td>
                  </tr>
                  <?
								$i++;
									} // termina el peque&ntilde;o
									mysql_free_result($rs);
				  }?>

</table>



<div><div></div></div>
<div id="footer">
	<p class="copyright">
		<a href="<?=$general->PagWeb?>" target="_blank"><?=$general->PagWeb?></a>
		 Escuela de POSGRADO - UNJBG<br> 2015 -
         <a href="<?=$general->PagWeb?>" target="_blank" title="Realizado para Ingenieria Web"><?=$general->PagWeb?></a>
	</p>
</div>

</body>
</html>