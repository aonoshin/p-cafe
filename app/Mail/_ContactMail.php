<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $view;
    public $subject;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = $inputs['name'];
        $this->email = $inputs['email'];
        $this->type = $inputs['type'];
        $this->content = $inputs['content'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('blue.travel.engineer@gmail.com')
            ->subject('自動返信メール')
            ->view('mails.contact')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'type' => $this->type,
                'content' => $this->content,
            ]);
    }
}
