<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpiringMedicine extends Mailable
{
    use Queueable, SerializesModels;
    // public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->data = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->data);
        $address = 'hr@devsspace.com';
        $name = 'HR';
        return $this->markdown('admin.email.expiringMedicine')->replyTo($address, $name)->subject('Expiring Medicine Mail - '.env('APP_NAME'));
    }
}