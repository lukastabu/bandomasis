<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant as R;

class Food extends Model
{
    use HasFactory;

    public function food_restaurant()
    {
        return $this->belongsTo(R::class, 'restaurant_id', 'id');
    }

}
