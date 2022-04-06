<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SortResource extends JsonResource
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
            'confirmed' => $this->confirmed,
            'recovered' => $this->recovered,
            'death'     => $this->death,
            'date'      => Carbon::parse($this->updated_at)->format('d-m-y'),
        ];
    }
}
