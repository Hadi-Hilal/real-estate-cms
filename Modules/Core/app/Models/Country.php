<?php

namespace Modules\Core\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('active', function ($builder) {
            $builder->where('active', true);
        });
    }

    public function states(){
        return $this->hasMany(State::class);
    }

}
