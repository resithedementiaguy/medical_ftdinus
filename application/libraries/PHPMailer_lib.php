<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class PHPMailer_lib
{
    protected $mail;
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->mail = new PHPMailer(true);
        $this->load_email_configuration();
    }

    private function load_email_configuration()
    {
        // Ambil data konfigurasi email dari database
        $email_config = $this->CI->db->get_where('email', ['id' => 1])->row();

        // Set up SMTP
        $this->mail->isSMTP();
        $this->mail->Host       = $email_config->host;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $email_config->email;
        $this->mail->Password   = $email_config->password;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;

        // Set pengirim
        $this->mail->setFrom($email_config->email, $email_config->nama_pengirim);
    }

    public function send_email($to, $subject, $body)
    {
        try {
            $this->mail->addAddress($to);

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
