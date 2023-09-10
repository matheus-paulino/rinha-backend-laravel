<?php

namespace App\Listeners;

use App\Events\PersonWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePersonCache implements ShouldQueue
{

    public function handle(PersonWasCreated $event): void
    {
        cache()->put(
            'person-' . $event->person->id,
            $event->person,
            60 * 60 * 24
        );
    }
}
