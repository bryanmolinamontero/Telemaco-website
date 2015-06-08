<?php


if ( $_SERVER['REQUEST_METHOD'] != 'POST' ) {

	echo "no me vas a hackear";

}
else{

	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$asunto = $_POST["asunto"];
	$mensaje = $_POST["mensaje"];


	require 'PHPMailer-master/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = '*************CUENTA********************';                 // SMTP username
	$mail->Password = '********PASSWORD DE LA CUENTA**********';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->From = '****** CUENTA DEL DESTINATARIO ******';
	$mail->FromName = 'Mailer';
	$mail->addAddress('****** CUENTA DEL DESTINATARIO ******', 'MENSAJE DE LA PAGINA');     // Add a recipient
	#$mail->addAddress('alertasmachala@hotmail.com');               // Name is optional
	#$mail->addReplyTo('alertasmachala@hotmail.com', 'Information');
	#$mail->addCC('cc@example.com');
	#$mail->addBCC('bcc@example.com');
	#$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments


	/*$im = imagegrabscreen();
	imagepng($im, "mi_captura_de_pantalla.png");
	imagedestroy($im);
	*/

	//$mail->addAttachment('mi_captura_de_pantalla.png', 'ok.png');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'TE HAN ESCRITO DESDE LA PAGINA';
	$mail->Body    = '<b>Nombre: </b> '.$nombre . '<br/>' . '<b>Email: </b> '.$email . '<br/>'. '<b>Asunto: </b> '.$asunto . '<br/>'. '<b>Mensaje: </b> '.$mensaje . '<br/>';
	#$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
		echo 'incorrecto';
		#echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'correcto';
	}

}