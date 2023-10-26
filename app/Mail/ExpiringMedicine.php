<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ExpiringMedicine extends Mailable
{
    use Queueable, SerializesModels;

    public $medicineDetails; // Define the property to hold medicine details

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($medicineDetails)
    {
        $medicineArray = [
            'name' => $medicineDetails->medicine_name,
            'quantity' => $medicineDetails->quantity,
        ];
        Log::info('Medicine Details:', $medicineArray);
        $this->medicineDetails = $medicineDetails; // Assign medicine details to the property
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'hr@devsspace.com';
        $name = 'HR';
        return $this->markdown('admin.email.expiringMedicine')
            ->with('medicineDetails', $this->medicineDetails)
            ->replyTo($address, $name)
            ->subject('Expiring Medicine Mail - '.env('APP_NAME'));
    }
}