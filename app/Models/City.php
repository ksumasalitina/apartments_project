<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class City extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function streets()
    {
        return $this->hasMany(Street::class);
    }
}
