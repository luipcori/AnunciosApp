<form name="reniec" action="consulta.php" method="post">
  <table width="0" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>DNI</td>
    <td>:</td>
    <td><input name="dni" type="text" value="<?=$_POST['dni']?>" /></td>
  </tr>
  <tr>
    <td>NOMBRE</td>
    <td>:</td>
    <td><input name="nom" type="text" value="<?=$_POST['nom']?>" />
    PATERNO:<input name="apep" type="text" value="<?=$_POST['apep']?>"/>
    MATERNO:<input name="apem" type="text" value="<?=$_POST['apem']?>"/></td>
  </tr>
  <tr>
    <td colspan="3"><input type="submit" value="buscar" /></td>
  </tr>

</table>
</form>

<?

if($_POST['dni'] <> "" || $_POST['nom'] <> "" || $_POST['apep'] <> "" || $_POST['apem'] <> "" ){
$c=ibase_pconnect("190.12.82.182:/database/dbfirebird/RENIEC_PADRON.FDB",'sysdba','masterkey');

$sql = 'SELECT RDB$RELATION_NAME
FROM RDB$RELATIONS
WHERE RDB$VIEW_BLR IS NULL
  AND RDB$SYSTEM_FLAG IS NULL OR RDB$SYSTEM_FLAG = 0';
//if($_POST['dni'] <> "") $sql = '';
//else $sql = '';
$rs = ibase_query($sql);
//ibase_close($c);

while ($R = ibase_fetch_object($rs)) {
var_dump($R);
}

$dni = strtoupper(trim($_POST['dni']));
$nom = strtoupper(trim($_POST['nom']));
$apep = strtoupper(trim($_POST['apep']));
$apem = strtoupper(trim($_POST['apem']));

if($_POST['dni'] <> "") $sql = "select * from PERSONA_NATURAL_VW where NRO_DOC_IDENTIDAD like '%$dni%' order by NRO_DOC_IDENTIDAD asc";
else $sql = "select * from PERSONA_NATURAL_VW where (upper(NOMBRES) || upper(APELLIDO_PATERNO) || upper(APELLIDO_MATERNO)) like '%$nom%$apep%$apem%' order by NOMBRES, APELLIDO_PATERNO, APELLIDO_MATERNO";

//echo $sql;
//$sql = "select * from PERSONA_NATURAL_VW where NRO_DOC_IDENTIDAD = '40373658'";
$rs = ibase_query($sql);
?>
<table width="919" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="126" bgcolor="#999999">DNI</td>
    <td width="150" bgcolor="#999999">NOMBRES</td>
    <td width="198" bgcolor="#999999">PATERNO</td>
    <td width="231" bgcolor="#999999">MATERNO</td>
    <td width="202" bgcolor="#999999">FECHA NAC</td>
  </tr>


<?
$c = 0;
while ($R = ibase_fetch_object($rs)) {
?>

  <tr>
    <td>&nbsp;<? echo $R->NRO_DOC_IDENTIDAD; ?></td>
    <td>&nbsp;<? echo $R->NOMBRES; ?></td>
    <td>&nbsp;<? echo $R->APELLIDO_PATERNO; ?></td>
    <td>&nbsp;<? echo $R->APELLIDO_MATERNO; ?></td>
    <td>&nbsp;<? echo $R->FECHA_INICIO; ?></td>
  </tr>

<?
$c = $c + 1;
}
?></table>

<br>
Resultados : <?=$c?> Regsitros.
<br><br><br><br>
<?
}
?>
