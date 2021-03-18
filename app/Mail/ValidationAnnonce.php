<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidationAnnonce extends Mailable
{
    use Queueable, SerializesModels;

    private $message;
    private $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin, $message)
    {
        $this->admin = $admin;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->admin->email)->view('emails.validationAnnonce')->with(['admin' => $this->admin, 'message' => $this->message]);
    }
}
