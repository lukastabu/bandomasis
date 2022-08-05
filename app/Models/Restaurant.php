<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food as F;

class Restaurant extends Model
{
    use HasFactory;

    public function rest_food()
    {
        return $this->hasMany(F::class, 'restaurant_id', 'id');   
    }

}
