<?php

namespace App\Listeners;

use App\Events\EmailEvent;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class EmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(EmailNotification $event)
    {
        //
        $even_name = $event->even_name;
        $facture = $event->facture;
        $complement_subject = "Réclamation en attente";
        $contentHTML = "<p>
                            Une nouvelle réclamation vient d'être imputée à la rubrique.
                        </p>";
        switch ($even_name) {
            case 'facture:initial': //Notification des membres nouvellement rajouté en tant que membre du projet
                Mail::to('abnsndoye@gmail.com')->send(new ResetPasswordMail($complement_subject, $contentHTML));

                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EmailEvent  $event
     * @return void
     */
    public function handle(EmailEvent $event)
    {
        //
    }
}
