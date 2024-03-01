<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $apartment_id
 * @property integer $max_people
 * @property string $number
 * @property string $description
 * @property integer $price
 * @property array $facilities
 */
class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'facilities' => 'array'
    ];
}
