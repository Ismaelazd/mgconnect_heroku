<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $formulaire;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form)
    {
        $this->formulaire = $form; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $form = $this->formulaire;
        return $this->from('info@mgconnect.com')->subject($this->formulaire->sujet)->view('mail.confirmationMail',compact('form'));
    }
}
