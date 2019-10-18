<?php
if ( isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['msg']) ) {
     
     // $nome = addcslashes($_POST['nome']);
     // $email = addcslashes($_POST['email']);
     // $msg = addcslashes($_POST['msg']);

     // $para = "ffpthai@gmail.com";
     // $assunto = "Perganunta do contato";
     // $corpo = "Nome: $nome | E-mail: $email | PHP_EOL Mensagem: $msg";
     // $vesaoPHP = phpversion();
     // $cabecalho =  "From: ffpthai@gmail.com\r\n 
     //                Reply-To: $email\r\n
     //                X-Mailer: PHP/$vesaoPHP";

     // mail($para, $assunto, $corpo, $cabecalho);

     // echo "email enviado com sucesso";
     // exit;

$Nome		= $_POST["nome"];	// Pega o valor do campo Nome
$Fone		= '';//$_POST["Fone"];	// Pega o valor do campo Telefone
$Email		= $_POST["email"];	// Pega o valor do campo Email
$Mensagem	= $_POST["msg"];	// Pega os valores do campo Mensagem

// Variável que junta os valores acima e monta o corpo do email

$Vai = "Nome: $Nome\n\nE-mail: $Email\n\nTelefone: $Fone\n\nMensagem: $Mensagem\n";

require_once("PHPMailer_5.2.4/class.phpmailer.php");

define('GUSER', 'ffpthai@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'klbnx069');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

 if (smtpmailer('fabiano@feevale.br', 'ffpthai@gmail.com', 'Nome do Enviador', 'Assunto do Email', $Vai)) {

	Header("location: envio_email.php"); // Redireciona para uma página de obrigado.

}
if (!empty($error)) echo $error;


}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link rel="stylesheet" href="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container-fluid" >
          <div class="row justify-content-center">
               <div class="col-lg-6">
                    <form method="post" action="">
                         <div class="form-group">
                              <label for="nome">Nome</label>
                              <input id="nome" class="form-control" type="text" name="nome" required>
                         </div>
                         <div class="form-group">
                              <label for="e-mail">E-mail</label>
                              <input id="e-mail" class="form-control" type="email" name="email" required>
                         </div>
                         <div class="form-group">
                              <label for="msg">Mensagem</label>
                              <textarea id="msg" class="form-control" name="msg" rows="6" required></textarea>
                         </div>
                         <button class="btn btn-primary" type="submit">Enviar</button>
                    </form>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>