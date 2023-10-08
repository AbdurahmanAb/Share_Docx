<?php

namespace Database\Factories\Helper;

class FactoryHelper {
public static function getRandomId(string  $model)
{
    $count = $model::query()->count();
        
if($count ==0){
            return $model::factory()->create()->id();
}else{
         return    rand(1, $count);
          
            
            

}
}
}

