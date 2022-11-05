<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;


    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

    }

    public function enviarConfirmacion() {

        // Crear el objeto del email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '972847bc611c15';
        $mail->Password = '036a38e381c49c';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress("cuentas@appsalon.com", "AppSalon.com");
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UFT-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ingnorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el Email
        $mail->send();
    }

    public function enviarInstrucciones() {

                // Crear el objeto del email
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '972847bc611c15';
                $mail->Password = '036a38e381c49c';
        
                $mail->setFrom('cuentas@appsalon.com');
                $mail->addAddress("cuentas@appsalon.com", "AppSalon.com");
                $mail->Subject = 'Restablece tu password';
        
                // Set HTML
                $mail->isHTML(TRUE);
                $mail->CharSet = 'UFT-8';
        
                $contenido = "<html>";
                $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo </p>";
                $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer password</a></p>";
                $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ingnorar el mensaje</p>";
                $contenido .= "</html>";
        
                $mail->Body = $contenido;
        
                // Enviar el Email
                $mail->send();
    }
}
