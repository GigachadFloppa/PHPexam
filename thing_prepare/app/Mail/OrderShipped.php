<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $textString;
    protected $address;

    public function __construct($textString, $address)
    {
        $this->textString = $textString;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@gmail.com')
            ->to($this->address)
            ->with([
                'textString' => $this->textString,
            ])
            ->view('mails.test-mail');
    }
}
