<?php
namespace App\Services\Geolocation;
use App\Services\Satelite\Satelite;
use App\Services\Map\Map;

class Geolocation
{
    /** 
   
     */

    private $map;
    private $sat;
    public function __construct(Map $map,Satelite $sat)
    {
        $this->map = $map;
        $this->sat = $sat;
        # code...
    }
   public function search(string $name){
    $location = $this->map->findAddress($name);
    return $this->sat->pin($location);
    }
    # code...
}