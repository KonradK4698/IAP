<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class przypomnijLeki extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $lekDoPrzyjecia;
    public $nadchodzaceWydarzenie;
    public function __construct($lekDoPrzyjecia, $nadchodzaceWydarzenie)
    {
        $this->lekDoPrzyjecia = $lekDoPrzyjecia;
        $this->nadchodzaceWydarzenie = $nadchodzaceWydarzenie;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.przypomnijCoMinute')->subject("Inteligentny asystent pacjenta - przypomnienie");
    }
}
