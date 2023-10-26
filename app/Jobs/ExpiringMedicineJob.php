<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ExpiringMedicine;
use Illuminate\Support\Facades\Mail;

class ExpiringMedicineJob implements ShouldQueue
{
    protected $sendEmail;
    protected $medicine;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct($sendEmail, $medicine)
    {
        // dd($sendEmail, $medicine);
        $this->sendEmail = $sendEmail;
        $this->medicine = $medicine;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // $email = new ExpiringMedicine();
        // Mail::to($this->sendEmail)->send($email);
        $medicineDetails = $this->medicine; // Assuming $this->medicine contains the medicine details
        Mail::to($this->sendEmail)->send(new ExpiringMedicine($medicineDetails));
    }
}
