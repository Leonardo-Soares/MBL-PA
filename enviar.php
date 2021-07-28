<?php
$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não Informado';
$email = isset($_POST['email']) ? $_POST['email'] : 'Não Informado';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : 'Não Informado';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : 'Não Informado';


require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
	// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'leolass1010@gmail.com';
	$mail->Password = 'Eletronica@8597';
	$mail->Port = 587;

	$mail->setFrom('leolass1010@gmail.com');
	$mail->addAddress('leolass1010@gmail.com');
	$mail->addAddress('falecom@mblpa.com.br');


	$mail->isHTML(true);
	$mail->Subject = 'ASSINATURA';
	$mail->Body = '
	<html>
	<head>
  		<title>Birthday Reminders for August</title>
	</head>
		<body>
			Nome: '.$nome.'<br>
			E-mail: '.$email.'<br>
			Telefone: '.$telefone.' <br>
			Cidade: '.$cidade.'<br>
		</body>
	</html>
	';

	// $mail->AltBody = 'Chegou o email teste do Canal TI';

	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}