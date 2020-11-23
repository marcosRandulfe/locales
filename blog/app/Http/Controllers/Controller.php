<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function show()
    {
        $locales=DB::select("select * from locales");
        return json_encode($locales);
    }
}
