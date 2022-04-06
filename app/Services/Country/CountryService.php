<?php

namespace App\Services\Country;

use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CountryService
{
    public function create($code, $name){

        DB::beginTransaction();

        try {
            Country::create([
                'code' => $code,
                'name' => $name,
            ]);

        DB::commit();

        } catch (\Exception $e){

            DB::rollback();
            return $e;
        }
    }
}
