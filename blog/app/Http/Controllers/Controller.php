<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function show()
    {   $localesFormateados=[];
        $locales=DB::select("SELECT * FROM `locales` L INNER JOIN `phones` P ON L.name=P.name WHERE L.validated=1");        
        foreach ($locales as $local) {
            if(isset($localesFormateados[$local->name])){
                $local=$localesFormateados[$local->name];
                if(isset($local->phones)){
                    $local->phones[]=
                }
            }else{
                $localesFormateados[$local->name]=$local;
            }
        }
        return var_dump($locales);
    }
}
