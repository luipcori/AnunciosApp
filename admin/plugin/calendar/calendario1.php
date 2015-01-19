<? require_once('../../../system/clases/files.php' );
require_once('../../../system/clases/files.php' );
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>jQuery UI Example Page</title>
	<link href="<?=$carpetas->dircss()?>smoothness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
	<script src="<?=$carpetas->dirjs()?>jquery-1.9.0.js"></script>
	<script src="<?=$carpetas->dirjs()?>jquery-ui-1.10.0.custom.js"></script>
	<script>
jQuery.noConflict();

	/* Inicialización en español para la extensión 'UI date picker' para jQuery. */
/* Traducido por Vester (xvester [en] gmail [punto] com). */
jQuery(function($){
   jQuery.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''};
   jQuery.datepicker.setDefaults($.datepicker.regional['es']);
}); 
    </script>