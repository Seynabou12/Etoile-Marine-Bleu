<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $contentHTML;
    protected $complement_subject;

    public function __construct(string $complement_subject, string $contentHTML)
    {
        //
        $this->complement_subject = $complement_subject;;
        $this->contentHTML = $contentHTML;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd('ok');
        return $this->markdown('emails.notification');

        $subject = config('app.name', 'Reset Password') . ' '. $this->complement_subject;
        return $this->subject($subject)
                    ->from('abnsndoye@outlook.fr','Transit')
                    ->markdown('emails.notification', [
                        'complement_subject' => $this->complement_subject,
                        'content' => $this->contentHTML
                    ]);
    }
}
