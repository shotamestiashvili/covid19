<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'code'      => $this->code,
            'country'   => $this->name,
            'confirmed' => $this->statistics[0]['confirmed'],
            'recovered' => $this->statistics[0]['recovered'],
            'death'     => $this->statistics[0]['death'],
            'date'      => Carbon::parse($this->statistics[0]['updated_at'])->format('d-m-y')
        ];
    }
}
