<?php

namespace App\Mail\Confirm;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Kompetisi;

class SendConfirm extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $kompetisi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $kompetisi = $user->kompetisi()->first();
        $this->user = $user;
        $this->kompetisi = $kompetisi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@invofest.com', 'INVOFEST')
                    ->subject('Konfirmasi Pendaftaran IT Competition Invofest 2018')
                    ->markdown('emails.confirm.confirm');
    }
}
