<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 18/5/10
 * Time: 下午4:27
 */
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    private $mail = '';

    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->mail, $method], $parameters);
    }

    public static function init($email)
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;

        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->Host = $email['host'];
        $mail->SMTPSecure = $email['encrypt'];
        $mail->Port = $email['port'];
        $mail->CharSet = 'UTF-8';
        $mail->FromName ='info@advlogs.com';
        $mail->Username = $email['email'];
        $mail->Password = $email['password'];
        $mail->From = $email['email'];
        $mail->addReplyTo('signup@advlogs.com', ' signup@advlogs.com');
        $mail->isHTML(true);
        return new static($mail);
    }

    public function __set($name, $value)
    {
        $this->mail->$name = $value;
        return $this;
    }

    public function addCc($email)
    {
        if ($email) {
            $this->mail->addCC($email);
        }
        return $this;
    }

    public function setSubject($subject)
    {
        $this->mail->Subject = $subject;
        return $this;
    }

    

    public function setBody($body)
    {
        $this->mail->Body = $body;
        return $this;
    }

    public function sendMail()
    {
        $status = $this->mail->send();
        return $status;
    }
}