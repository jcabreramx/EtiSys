<?php

namespace App\Mail;

use App\Models\catPlantillasAlertas;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $nombre;
    public $password;
    public $subject;
    public $mensaje;
    public $email;

    public function __construct($usuario, $nombre, $password, $subject, $mensaje, $email)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->subject = $subject;
        $this->mensaje = $mensaje;
        $this->email = $email;
    }

    public function build()
    {
        return $this->view('correos.plantillaMail')
        ->subject($this->subject);
    }
}
