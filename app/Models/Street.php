<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $city_id
 * @property string $name
 */
class Street extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
