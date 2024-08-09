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
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.gmail.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'unravelnest@gmail.com'; // Ganti dengan email Anda
        $this->mail->Password   = 'yklp mejt ldda ouiq'; // Gunakan variabel lingkungan untuk password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;
    }

    public function send_email($to, $subject, $body)
    {
        try {
            // Recipients
            $this->mail->setFrom('unravelnest@gmail.com', 'Alfaturachman');
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
