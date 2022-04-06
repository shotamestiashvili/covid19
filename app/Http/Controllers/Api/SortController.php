<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Http\Resources\SortResource;
use App\Models\Country;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function sort(Request $request){

        $countriesStat = Country::join('statistics', 'countries.id', '=', 'statistics.country_id')
            ->orderBy('statistics.'."$request->column", $request->sort)->get();

          return SortResource::collection($countriesStat);
    }

}
