<?php

namespace App\Listeners;

use App\Events\ActionLogEvent;
use App\Models\Action;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActionLogNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ActionLogEvent  $event
     * @return void
     */
    public function handle(ActionLogEvent $event)
    {
        //
        Action::create([
            'type' => $event->type ? $event->type : "Type - manquant",
            'user_id' => $event->user_id,
            'commentaire' => $event->commentaire ? $event->commentaire : "Commentaire - manquant"
        ]);
    }
}
