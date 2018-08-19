<?php

namespace App\Mail\Confirm;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Peserta;

class SendTiket extends Mailable
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
                    ->subject('E-Tiket Invofest 2018')
                    ->markdown('emails.confirm.tiket');
    }
}
