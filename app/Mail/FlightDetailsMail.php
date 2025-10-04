<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FlightDetailsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $flightDetail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($flightDetail)
    {
        $this->flightDetail = $flightDetail;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation of your pre-registration for the 36th International Air Gathering in Tunisia!')
        ->view('emails.flightDetails')
        ->with('flightDetail', $this->flightDetail);
    }
}
