<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPostEmail extends Mailable

{

    use Queueable, SerializesModels;
    public $post;

    
    
    public function __construct($post)
    {
        $this->post=$post;


        
    }
    
    public function envelope()
    {
        return new Envelope(
            subject: $this->post->title,
        );
    }

    
    public function content()
    {
        return new Content(
            view: 'email',
        );
    }

    public function attachments()
    {
        return [];
    }
}
