<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Notifications\ProductComplete;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProductNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  ProductCreated  $event
     */
    public function handle(ProductCreated $event)
    {
        return true;
    }
}
