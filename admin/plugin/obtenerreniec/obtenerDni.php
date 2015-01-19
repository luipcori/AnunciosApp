<?
$dni1 = $_POST['dni']; //40111698';
echo $dni1; exit();

$c=ibase_pconnect("192.168.40.109:/database/dbfirebird/RENIEC_PADRON.FDB",'sysdba','masterkey');
$sql = "select * from PERSONA_NATURAL_VW where NRO_DOC_IDENTIDAD = '$dni1'";
if($rs = ibase_query($sql)){
$R = ibase_fetch_object($rs);
		//echo $R->NRO_DOC_IDENTIDAD.'<br>';
		echo 'document.getElementById('."'nom'".').value='."'".$R->NOMBRES."'".';';
		echo 'document.getElementById('."'apep'".').value='."'".$R->APELLIDO_PATERNO."'".';';
		echo 'document.getElementById('."'apem'".').value='."'".$R->APELLIDO_MATERNO."'".';';
		if($R->SEXO == 1) echo 'document.getElementById('."'sexoH'".').checked = true;';
		if($R->SEXO == 0) echo 'document.getElementById('."'sexoM'".').checked = true;';
		/*echo $R->APELLIDO_PATERNO.'<br>';
		echo $R->APELLIDO_MATERNO.'<br>';*/

}
?>
