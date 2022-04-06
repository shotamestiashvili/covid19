<?php

namespace App\Services\Statistic;


use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class StatisticService
{
    public function justDoIt($result, $country_id)
    {
         if(!Statistic::where('country_id', $country_id)->exists()){
             $this->create($result, $country_id);
         }

            $lastUpdated  = Statistic::where('country_id', $country_id)
                                     ->select('updated_at')
                                     ->latest()
                                     ->first();

             $lastUpdatedApi = Carbon::parse($result->updated_at)->format('d');
             $lastUpdatedDb  = Carbon::parse($lastUpdated['updated_at'])->format('d');

             if($lastUpdatedApi > $lastUpdatedDb){

                 $this->create($result, $country_id);
             }else{
                 $this->update($result, $country_id);
             }

    }



    public function create($result, $country_id){

        DB::beginTransaction();

        try {
            Statistic::create([
                'country_id'  => $country_id,
                'confirmed'   => $result->confirmed,
                'recovered'   => $result->recovered,
                'death'      => $result->deaths,
            ]);

            DB::commit();

        } catch (\Exception $e){

            DB::rollback();
            return $e;
        }
    }



    public function update($result, $country_id) {

        DB::beginTransaction();

        try {

        Statistic::where('country_id', $country_id)->update([
            'confirmed'   => $result->confirmed,
            'recovered'   => $result->recovered,
            'death'       => $result->deaths,
        ]);
            DB::commit();

        } catch (\Exception $e){

            DB::rollback();
            return $e;
        }
    }
}
