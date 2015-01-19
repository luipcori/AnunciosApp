<? 
	session_start();
	include('../buscar/buscar.php');
	//require_once('../../../models/dbtipo_lider.php' );
	require_once('../../../models/dbalumno.php' );
	$trabajador = new dbalumno();
	//include('../buscar/buscar.php');
	$var1 = $_POST['var1'];
	$var2 = $_POST['var2'];
	$var3 = $_POST['var3'];
	$var4 = $_POST['var4'];
	$cadenaBusqueda = $_POST['criterio'];
//	echo $cadenaBusqueda;
	$div = $_POST['divC'];
	if($_SESSION['tablaB_'] == ""){
		$tablaB = $_POST['tabla'];
		$_SESSION['tablaB_'] = $tablaB;
	}else $tablaB = $_SESSION['tablaB_'];
	//echo '<br>'.$tablaB.'<br>';
	//echo '<br>'.$var1.'<br>';
	//echo '<br>'.$var2.'<br>';
	//echo '<br>'.$var3.'<br>';
	//echo '<br>'.$var4.'<br>';
	
	//echo '<br>'.$cadenaBusqueda.'<br>';
	//echo '<br>'.$div.'<br>';*/
//	exit();
	
	$buscador1 = new Buscador();
	//echo $tablaB;
	//if($tablaB == 'filiacion'){
		if($_POST['criterio'] <> "0" ) $lista = $trabajador->mostrar_personas($cadenaBusqueda,'');
		else $lista = $trabajador->mostrar_personas('','');
	//}
	//var_dump($lista);
//	$buscador1->Mostrar($var1,$var2,$lista,'600',$div);
	//if($var3 <> "") $buscador1->Mostrar1($var1,$var2,$var3,$var4,$lista,'600',$div,$tablaB);
	//else 
	
	$buscador1->Mostrar($var1,$var2,$var3,$var4,$lista,'600',$div,$tablaB);
?>