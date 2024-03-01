<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $apartment_id
 */
class UserFavorite extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
