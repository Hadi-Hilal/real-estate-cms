<?php

namespace Modules\Core\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities(){
        return $this->hasMany(City::class);
    }

}
