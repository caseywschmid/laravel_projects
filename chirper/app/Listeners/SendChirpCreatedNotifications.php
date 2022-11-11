<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ChirpCreated;
use App\Notifications\NewChirp;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendChirpCreatedNotifications implements ShouldQueue
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
     * @param  \App\Events\ChirpCreated  $event
     * @return void
     */
    public function handle(ChirpCreated $event)
    {
        foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user){
            $user->notify(new NewChirp($event->chirp));
        }
    }
}
