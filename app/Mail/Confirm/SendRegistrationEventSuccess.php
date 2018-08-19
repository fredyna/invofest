<?php

namespace App\Mail\Confirm;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Peserta;

class SendRegistrationEventSuccess extends Mailable
{
    use Queueable, SerializesModels;
    public $peserta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Peserta $peserta)
    {
        $this->peserta = $peserta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@invofest.com', 'INVOFEST')
                    ->subject('Registrasi Acara Invofest 2018 Sukses')
                    ->markdown('emails.confirm.registrationEventSuccess');
    }
}
