<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailMarketingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailContent;
    public $emailSubject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailContent, $emailSubject)
    {
        // Store the HTML content
        $this->emailContent = $emailContent;
        $this->emailSubject = $emailSubject;
    }

    public function build()
    {
        return $this->view('emails.emailmarketing')
            ->subject($this->emailSubject);
    }
}

