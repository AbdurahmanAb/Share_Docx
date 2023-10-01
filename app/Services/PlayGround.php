<?php

namespace App\Services;

use App\Services\Geolocation\GeolocationFacade;

class PlayGround{


    public function __construct()
    {
       
       dump (GeolocationFacade::search("abdu"));
        # code...
    }
}


?>