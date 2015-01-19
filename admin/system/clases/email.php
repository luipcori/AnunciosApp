<?
require_once('class.phpmailer.php');

class email extends PHPMailer{
	function Inicializacion(){

		date_default_timezone_set('America/El_Salvador'); //Se define la zona horaria
		//require_once('class.phpmailer.php'); //Incluimos la clase phpmailer
 
		//$mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores.
 
		$this->IsSMTP(); // Se especifica a la clase que se utilizará SMTP
 
		try {
			//------------------------------------------------------
			  $correo_emisor="aldorch@gmail.com";     //Correo a utilizar para autenticarse
			  //con Gmail o en caso de GoogleApps utilizar con @tudominio.com
			  $nombre_emisor="Aldo";               //Nombre de quien envía el correo
			  $contrasena="ivonyaldo";          //contraseña de tu cuenta en Gmail
			  $correo_destino="r0n_ald0@gmail.com";      //Correo de quien recibe
			  $nombre_destino="Ron";                //Nombre de quien recibe
			//--------------------------------------------------------
			  $this->SMTPDebug  = 2;                     // Habilita información SMTP (opcional para pruebas)
														 // 1 = errores y mensajes
														 // 2 = solo mensajes
			  $this->SMTPAuth   = true;                  // Habilita la autenticación SMTP
			  //$this->SMTPSecure = "ssl";                 // Establece el tipo de seguridad SMTP
			  $this->Host       = "smtp.gmail.com";      // Establece Gmail como el servidor SMTP
			  $this->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail
			  $this->Username   = $correo_emisor;         // Usuario Gmail
			  $this->Password   = $contrasena;           // Contraseña Gmail
			  //A que dirección se puede responder el correo
			  $this->AddReplyTo($correo_emisor, $nombre_emisor);
			  //La direccion a donde mandamos el correo
			  $this->AddAddress($correo_destino, $nombre_destino);
			  //De parte de quien es el correo
			  $this->SetFrom($correo_emisor, $nombre_emisor);
			  //Asunto del correo
			  $this->Subject = 'Prueba de phpMailer en Garabatos Linux';
			  //Mensaje alternativo en caso que el destinatario no pueda abrir correos HTML
			  $this->AltBody = 'Hijole para ver el mensaje necesita un cliente de correo compatible con HTML.';
			  //El cuerpo del mensaje, puede ser con etiquetas HTML
			  $this->MsgHTML("<strong>¿Que otro nombre recibe el área de sol del Estadio Cuscatlán?</strong>");
			  //Archivos adjuntos
			 // $this->AddAttachment('img/logo.jpg');      // Archivos Adjuntos
			  //Enviamos el correo
			  $this->Send();
			  echo "Mensaje enviado. Que chivo va vos!!";
		} catch (phpmailerException $e) {
	  		echo $e->errorMessage(); //Errores de PhpMailer
		} catch (Exception $e) {
	  		echo $e->getMessage(); //Errores de cualquier otra cosa.
		}
	}
}
?>
