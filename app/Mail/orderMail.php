<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class orderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subject = $subject;
        $this->data   = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailSendNow = $this->subject($this->subject)->view('email-templates.customerOrder')
        ->with([

            'data' => $this->data,
        ]);        
        return $emailSendNow;
    }
}
