<?
class correo{
	var $destinatario;
	var $remitente;
	var $asunto;
	var $mensaje;

function enviar() {
	$headers = "From: ".$this->remitente."\r\nReply-To: ". $this->remitente;
	ob_start(); 
	$message = ob_get_clean();
	$mail_sent = @mail( $this->destinatario, $this->asunto, $this->mensaje, $headers );
	echo $destinatario;
	echo $mail_sent ? "Correo Enviado" : "No se ha podido enviar el correo";
	}
}
?>