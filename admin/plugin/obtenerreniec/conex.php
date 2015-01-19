<form name="reniec" action="" method="post">
  <table width="0" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>DNI</td>
    <td>:</td>
    <td><input name="dni" type="text" /></td>
  </tr>
  <tr>
    <td>NOMBRE</td>
    <td>:</td>
    <td><input name="nom" type="text" />PATERNO:<input name="apep" type="text" />MATERNO<input name="apem" type="text" /></td>
  </tr>
  <tr>
    <td colspan="3"><input type="submit" value="buscar" /></td>
  </tr>

</table>
</form>

<?
$c=ibase_pconnect("190.12.82.182:/database/dbfirebird/RENIEC_PADRON.FDB",'sysdba','masterkey');





/*$sql = 'SELECT RDB$RELATION_NAME
FROM RDB$RELATIONS
WHERE RDB$VIEW_BLR IS NULL
  AND RDB$SYSTEM_FLAG IS NULL OR RDB$SYSTEM_FLAG = 0';*/
  
  $sql = "SELECT RDB$FIELD_NAME
FROM RDB$RELATION_FIELDS";
// WHERE RDB$RELATION_NAME='PERSONA_NATURAL'";
//if($_POST['dni'] <> "") $sql = '';
//else $sql = '';
$rs = ibase_query($sql);
//ibase_close($c);

while ($R = ibase_fetch_object($rs)) {
var_dump($R);
}

$sql = 'SELECT RDB$FIELD_NAME
FROM RDB$RELATION_FIELDS
WHERE RDB$VIEW_BLR IS NULL
  AND RDB$SYSTEM_FLAG IS NULL OR RDB$SYSTEM_FLAG = 0';
//$sql = 'select * from PERSONA_NATURAL2_VW';
$rs = ibase_query($sql);
while ($R = ibase_fetch_object($rs)) {
	var_dump($R);
}


?>
