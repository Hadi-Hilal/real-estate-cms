<?php

namespace Modules\Core\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Land\app\Models\Land;
use Modules\Property\app\Models\Property;

class City extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function lands()
    {
        return $this->hasMany(Land::class);
    }
}
