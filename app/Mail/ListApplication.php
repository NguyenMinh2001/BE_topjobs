<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ListApplication extends Mailable
{
    use Queueable, SerializesModels;
    public $applications;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($applications)
    {
        $this->applications = $applications;
    }

    public function build()
    {
        return $this->subject('danh sách ứng viên')
                    ->view('emails.sendmail-listapplication');
    }
}
