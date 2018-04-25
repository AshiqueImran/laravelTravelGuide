<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $place;

    public function __construct($placeName)
    {
        $this->place= $placeName;
    }


    public function build()
    {
        return $this->from('noreply@travelguide.com')
                    ->subject('Travel Confirmation')
                    ->view('email/index')
                    ->with('place',$this->place);
    }
}
