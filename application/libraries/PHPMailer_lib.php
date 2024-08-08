<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class PHPMailer_lib
{

    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function send_email($to, $subject, $body)
    {
        try {
            // Server settings
            $this->mail->isSMTP();
            $this->mail->Host       = 'smtp.example.com'; // Ganti dengan SMTP server Anda
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = 'alemaulana09@gmail.com'; // Ganti dengan email Anda
            $this->mail->Password   = 'rachman0910'; // Ganti dengan password email Anda
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port       = 587;

            // Recipients
            $this->mail->setFrom('maulanalevi98@gmail.com', 'Mailer');
            $this->mail->addAddress($to);

            // Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = strip_tags($body);

            $this->mail->send();
            return 'Message has been sent';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
