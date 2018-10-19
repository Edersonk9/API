<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MailModel;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
  public $mail;

    public function __construct(MailModel $email){
      $this->mail   = $email;
    }

    public function build()    {
      if($this->mail->envio == 'cadastro')
        return $this->view('mail.cadastro');
      elseif($this->mail->envio == 'fluxo')
        return $this->view('mail.fluxo')->attach($this->mail->anexo);
      else
        return $this->view('mail.mail');
    }
}
