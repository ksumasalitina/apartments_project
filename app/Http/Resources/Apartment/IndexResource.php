<?php

namespace App\Http\Resources\Apartment;

use App\Models\Apartment;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Apartment $apartment */
        $apartment = $this->resource;

        return [
            'id' => $apartment->id,
            'name' => $apartment->name,
            'description' => Str::limit($apartment->description, 150),
            'city_id' => $apartment->street->city->id,
            'stars' => $apartment->stars,
            'rate' => $apartment->getRate()->rate,
            'location_rate' => $apartment->getRate()->locationRate,
            'clean_rate' => $apartment->getRate()->cleanRate,
            'service_rate' => $apartment->getRate()->serviceRate,
            'comfort_rate' => $apartment->getRate()->comfortRate,
            'image' => $apartment->images[0]
        ];
    }
}
