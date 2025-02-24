<?php

namespace App\Listeners;

use App\Events\ChangeUser;
use denis660\Centrifugo\Centrifugo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeUserNotification
{
    /**
     * Create the event listener.
     */
    public function __construct( private Centrifugo $centrifugo)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ChangeUser $event): void
    {
        $user = $event->changedUser();

        $this->centrifugo->publish('auth_user_'.$user['id'], ['user' => $user]);
    }
}
