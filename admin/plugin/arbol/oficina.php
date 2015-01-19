<link rel="stylesheet" href="css/jquery.treeview.css" />
<link rel="stylesheet" href="css/screen.css" />

<script src="../../plugin/arbol/lib/jquery.js" type="text/javascript"></script>
<script src="../../plugin/arbol/js/jquery.treeview.js" type="text/javascript"></script>

<script type="text/javascript">
		$(function() {
			$("#tree").treeview({
				collapsed: true,
				animated: "medium",
				control:"#sidetreecontrol",
				persist: "location"
			});
		})
<? if($_GET['band'] == '1'){ ?>		
function RecuperarValor(valor1, valor2){
	//alert(valor1);
	//alert(opener.document.frmMod.idInstancia.value);
	//parent.document.getElementById('padre_oficina_nom').value = valor1;
	
	
	 //window.opener.document.all.frmMod;
	 //self.opener.document.getElementById("idElemento").value;
		alert(self.opener.document.getElementById('idInstancia').value);
/*	
	if(opener.document.frmMod.idInstancia.value != valor1){
		opener.document.frmMod.padre_oficina.value = valor1;
		opener.document.frmMod.padre_oficina_nom.value = valor2;
		window.close();
	} else {
		alert('No se puede seleccionar la misma oficina como padre!!!');
		//opener.document.frmMod.padre_oficina.value = "";
		//opener.document.frmMod.padre_oficina_nom.value = "";
	} */
}
<? } else {?>
function RecuperarValor(valor1, valor2){
		opener.document.frmMod.padre_oficina.value = valor1;
		opener.document.frmMod.padre_oficina_nom.value = valor2;
		window.close();
}
<? } ?>

function SinOficina(){
		opener.document.frmMod.padre_oficina.value = 0;
		opener.document.frmMod.padre_oficina_nom.value = 'NINGUNO';
		window.close();

}
</script>


<div id="sidetree" style="margin:10px 10px 10px 10px; font-size:14px; font-weight:bold">
<div id="sidetreecontrol">
	<a href="#" onclick="SinOficina();">Sin Oficina</a><br>
    <a href="?#">Contaer Todo</a> 
	<a href="?#">Expandir Todo</a>
</div>

<?    require_once('../../aplication/models/dboficina.php');
$tree = array();
$arbol = new dboficina();

$tree = $arbol->CrearArbol('0','');
//var_dump($tree);

 ?>
</div>