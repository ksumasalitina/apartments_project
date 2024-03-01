<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $apartment_id
 * @property string $title
 * @property string $message
 * @property integer $rate
 * @property integer $comfort_rate
 * @property integer $clean_rate
 * @property integer $service_rate
 * @property integer $location_rate
 */
class Feedback extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
