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
                $antiguo=$localesFormateados[$local->name];
                if(isset($antiguo->phones)){
                    $antiguo->phones[]=$local->phone;
                }else{
                    $antiguo->phones=[$antiguo->phone,$local->phone];
                }
                unset($antiguo->phone);
                $localesFormateados[$local->name]=$antiguo;
            }else{
                $localesFormateados[$local->name]=$local;
            }
        }
        return json_encode($localesFormateados);
    }
}
