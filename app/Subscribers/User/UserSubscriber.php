<?php
namespace App\Subscribers\User;

use App\Events\User\UserCreated;
use App\Listeners\SendWelcomeMail;
use Illuminate\Events\Dispatcher;

class UserSubscriber{

public function subscribe(Dispatcher $events)
{
        $events->listen(UserCreated::class, SendWelcomeMail::class);
}
}

?>