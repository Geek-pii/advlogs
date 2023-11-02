<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Mail;

class SendEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $address; //email address
    public $body; //email content
    public $attachment; //email attachement
    public $title; //email title
    public $sender; //email config
    public $cc;

    /**
     * SendEmail constructor.
     *
     * @param $address
     * @param $title
     * @param $body
     * @param array $attachment
     */
    public function __construct($sender, $address, $title, $body, $cc = '', $attachment = [])
    {
        $this->address = $address;
        $this->body    = $body;
        $this->attachment = $attachment;
        $this->title   = $title;
        $this->cc = $cc;
        if (empty($sender)) {
            $sender = [
                'host'     => config('mail.mailers.smtp.host'),
                'port'     => config('mail.mailers.smtp.port'),
                'email'    => config('mail.mailers.smtp.username'),
                'password' => config('mail.mailers.smtp.password'),
                'encrypt'  => config('mail.mailers.smtp.encryption'),
            ];
        }
        $this->sender  = $sender;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $mail = Mail::init($this->sender);

        $mail->setSubject($this->title)->setBody($this->body)->addCc($this->cc);
        if (!empty($this->attachment)) {
            foreach ($this->attachment as $attchment) {
                $file = file_get_contents($attchment['path']);
                $mail->addStringAttachment($file, $attchment['name']);
            }
        }
        $mail->addAddress($this->address);
        $mail->sendMail();
    }

}
