<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Http\Resources\SortResource;
use App\Http\Resources\StatisticResource;
use App\Models\Country;


class ApiController extends Controller
{
    public function index(){

        if(request('table') === 'countries'){

            $countriesStat =  Country::where(request('column'), 'LIKE', '%' . request('search') . '%')->get();
            return ApiResource::collection($countriesStat);

        }elseif(request('table') === 'statistics'){

            $countriesStat = Country::join('statistics', 'countries.id', '=', 'statistics.country_id')
                ->where('statistics.'.request('column'), 'LIKE', '%' . request('search') . '%')->get();
             return StatisticResource::collection($countriesStat);

        }else{

            $countriesStat = Country::with('statistics')->get();
             return ApiResource::collection($countriesStat);
        }

    }
}
