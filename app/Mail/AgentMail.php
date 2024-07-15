<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\User;
use App\Profile;
use App\Permission;
use DateTime;
use DB;

class AgentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $idview = $this->id;
        $users = User::get();
        date_default_timezone_set('America/Mexico_City');
        $today = new DateTime();
        $bdays = DB::select('call bdayMail(?,?)',[$today->format('m'), $today->format('d')]);

        return $this->subject('Correo informativo Torralto')->view('mail.agentmail', compact('idview','bdays'));
    }
}
