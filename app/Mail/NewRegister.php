<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewRegister extends Mailable
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
        return $this->subject('New Registration Received')
                    ->view('emails.new_register')
                    ->with([
                        'flightDetail' => $this->flightDetail,
                    ]);
    }
}
