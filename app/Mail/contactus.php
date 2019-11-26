<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactus extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject,$body)
    {
        $this->name=$name;
        $this->email=$email;
        $this->subject=$subject;
        $this->body=$body;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //No need to pass parameters beacuse they are public
        return $this->view('mail.contact')->from('h@gmail.com');
        // in case of bieng private parameters
        //return $this->view('mail.contact' , compact(name,email,subject,body));
    }
}
