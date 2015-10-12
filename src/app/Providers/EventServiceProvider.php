<?php

namespace PCI\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event listener mappings for the application.
     * @var array
     */
    protected $listen = [
        'PCI\Events\NewUserRegistration' => [
            'PCI\Listeners\Email\EmailUserConfirmation',
        ],
        'PCI\Events\ConfirmationCodeRequest' => [
            'PCI\Listeners\Email\EmailUserConfirmation',
        ],
        'PCI\Events\NewPetitionCreation' => [
            'PCI\Listeners\Email\EmailPetitionEventToAttendants',
            'PCI\Listeners\Email\EmailPetitionEventToCreator',
        ],
    ];

    /**
     * Register any other events for your application.
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
        //
    }
}
