<?php

namespace App\Models;

use App\Data\ApartmentTypes;
use App\Data\ModerationStatuses;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $description
 * @property ApartmentTypes $type
 * @property string $building
 * @property integer $street_id
 * @property integer $stars
 * @property ModerationStatuses $moderation_status
 * @property array $images
 * @property array $facilities
 * @property array $rate
 */
class Apartment extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $casts = [
        'type' => ApartmentTypes::class,
        'moderation_status' => ModerationStatuses::class,
        'images' => 'array',
        'facilities' => 'array',
        'rate' => 'array'
    ];
}
