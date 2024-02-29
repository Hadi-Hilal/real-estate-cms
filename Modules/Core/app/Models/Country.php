<?php

namespace Modules\Core\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $appends = ['image'];

    protected static function booted()
    {
        static::addGlobalScope('active', function ($builder) {
            $builder->where('active', true);
        });
    }

    public function getImageAttribute()
    {
        if ($this->attributes['flag']) {
            $path = asset($this->attributes['flag']);
        } else {
            $path = asset('images/blank.png');
        }
        return $path;
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

}
