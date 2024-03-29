<?php

namespace App\Providers;

use App\Events\BackupZipWasCreated;
use App\Events\NftReferCommissionEvent;
use App\Events\ReferralCommission;
use App\Events\RegisterBonus;
use App\Listeners\BackupZipWasCreatedListner;
use App\Listeners\MailSuccessfulDatabaseBackup;
use App\Listeners\NftReferCommission;
use App\Listeners\ProccessReferralCommission;
use App\Listeners\ProccessRegisterBonus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ReferralCommission::class => [
            ProccessReferralCommission::class
        ],
        NftReferCommissionEvent::class => [
            NftReferCommission::class
        ],
        RegisterBonus::class => [
            ProccessRegisterBonus::class
        ],
        \Spatie\Backup\Events\BackupZipWasCreated::class => [
            MailSuccessfulDatabaseBackup::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
