<?php
	session_start();

	function enviaEmail($data){


		$error = NULL;

		if(empty($data['Nombre']) || empty($data['Correo Electronico']) || empty($data['Asunto'])  || empty($)){
			$error .= 'Complete los campos requeridos.';
		}

		if(is_null($error)){

		//envio el mensaje

		require 'PHPMailer/PHPMailerAutoload.php';
					$mail = new PHPMailer;

					$mail->From = 'gromca.group@gmail.com';
					$mail->FromName = 'Gromcagroup';

					$mail->addAddress($data['email'], $data['nombre']); // Add a recipient
					$mail->addReplyTo($data['email'], 'Gromcagroup');


					$mail->addBCC('gromca.group@gmail.com');
					$mail->isHTML(true); // Set email format to HTML
					$mail->CharSet = 'UTF-8';
					$mail->Subject = 'Gracias por tu interés, te responderemos pronto';
					$mail->Body    = '<style type="text/css">
body{
font-family:	"adineue LT, Arial, Helvetica, sans-serif";
margin:0;
padding:0
}
p, h1{
margin:0;
padding:0
}

h1{
font-family:	"adineue BD, Arial, Helvetica, sans-serif";
font-size: 5em;

}

div p, h1{
	padding-left:80px;


}
div img{
	padding-bottom:80px;

}

</style>




<div>

<p>Gracias por tu inter&eacute;s, te responderemos pronto</p>
<p>Nombre: '.$data['Nombre'].'</p>
<p>Email: '.$data['Correo Electronico'].'</p>

<p>asunto: '.$data['Asunto'].'</p>




</div>';


		if(!$mail->send()) {
					    echo 'El mensaje no pudo ser enviado.';
					    echo 'Error: ' . $mail->ErrorInfo;
					} else {
					//	$mensajeEnviado = "Solicitud enviada";
					    echo 'Su mensaje ha sido enviado';
					} //else if mensaje send



		}else{
			return $error;
		}

	}
