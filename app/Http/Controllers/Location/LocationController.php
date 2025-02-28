<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCities(){
        $cities = City::get();
        return response()->json(['cities' => $cities]);
    }
}
