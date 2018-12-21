<?php

namespace App\Mail;

use App\Config;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendingMailToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $subjectSender = Config::where('name', 'email-sender-subject')->first();
        $fromSender = Config::where('name', 'email-sender-from')->first();
        $signatures = Config::where('name', 'email-signatures')->first()->content;
        $content = Config::where('name', 'email-sender-content')->first()->content;
        return $this->view('mail.mail-to-customer', ['signatures' => $signatures,'content'=>$content])->to($request->email)->subject($subjectSender->content)->from('nnduyquang@gmail.com', $fromSender->content);;
    }
}
