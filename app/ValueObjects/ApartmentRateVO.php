<?php

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;

class ApartmentRateVO implements  Arrayable
{
    public function __construct(
        public float $rate,
        public float $comfortRate,
        public float $cleanRate,
        public float $serviceRate,
        public float $locationRate
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            rate: $data['rate'],
            comfortRate: $data['comfort_rate'],
            cleanRate: $data['clean_rate'],
            serviceRate: $data['service_rate'],
            locationRate: $data['location_rate']
        );
    }

    public function toArray(): array
    {
        return [
            'rate' => $this->rate,
            'comfort_rate' => $this->comfortRate,
            'clean_rate' => $this->cleanRate,
            'service_rate' => $this->serviceRate,
            'location_rate' => $this->locationRate
        ];
    }
}
