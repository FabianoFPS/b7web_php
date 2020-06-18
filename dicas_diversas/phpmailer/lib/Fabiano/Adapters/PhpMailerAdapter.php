<?php

//namespace Fab\Adapters;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PhpMailerAdapter{

    private PHPMailer $mail;

    function __construct(){

        $this->mail = new PHPMailer(true);
        $this->serverSettings();
    }

    private function serverSettings(){

        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->Debugoutput = 'html';
        $this->mail->isSMTP();
        $this->mail->Host       = MAIL_HOST;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = MAIL_USERNAME;
        $this->mail->Password   = MAIL_PASSWORD ;
        $this->mail->SMTPSecure = "tls";
        //$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = MAIL_PORT;
    }

    //usar o validador de email

    function setFrom($email, $name = null){

        if( is_null($name) ){
            
            $this->mail->setFrom($email);

        }else{

            $this->mail->setFrom($email, $name);
        }
    }

    function addAddress($email, $name){

        $this->mail->addAddress($email, $name);
    }

    function addAttachment($caminho, $nomeArquivo){

        $this->mail->addAttachment($caminho, $nomeArquivo);
    }

    function mountContent(string $assunto, string $corpo){

        $this->mail->isHTML(true);
        $this->mail->Subject = $assunto;
        $this->mail->Body    = $corpo;
        $this->mail->AltBody = 'opcional';
    }

    function send(){

        if (!$this->mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }
    }
}

/*
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 */