<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $application;


    public function __construct(Application $application)
    {
        $this->application = $application;
    }


    public function build()
    {
//        return $this->view('view.name');
        $mail =  $this->from('example@example.com', 'Example')
            ->view('emails.application-created');


            if(! is_null($this->application->file_url)){
                $mail->attachFromStorageDisk('public', $this->application->file_url);
            }

            return $mail;
    }
}
