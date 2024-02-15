<?php

namespace Modules\Land\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Modules\Core\app\Models\City;
use Modules\Core\app\Models\Country;
use Modules\Core\app\Models\District;
use Modules\Core\app\Models\State;
use Modules\Property\app\Models\PropertyFeature;
use Modules\Property\app\Models\PropertyType;
use Spatie\Translatable\HasTranslations;

class Land extends Model
{
    use HasFactory;
     use HasTranslations;

    public $translatable = ['title', 'description', 'keywords', 'content'];
    protected $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
        'content',
        'image',
        'slides',
        '3d' ,
        'tapu',
        'land_type_id',
        'regulation',
        'ratio',
        'price',
        'space',
        'net_space',
        'deduction',
        'code',
        'country_id',
        'state_id',
        'city_id',
        'district_id',
        'created_by',
        'publish',
        'featured',
        'visits',
    ];
    protected $appends = ['image_link'];
    protected $with = ['features'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($land) {
            $land->created_by = Auth::id();
        });
    }

    public function getImageLinkAttribute()
    {
        if ($this->attributes['image']) {
            $path = asset('storage/' . $this->attributes['image']);
        } else {
            $path = asset('images/blank.png');
        }
        return $path;
    }

    public function getSlidesAttribute()
    {
        if ($this->attributes['slides']) {
            return json_decode($this->attributes['slides']);
        }
        return null;
    }

    public function features()
    {
        return $this->belongsToMany(LandFeature::class, 'land_feature_pivot');
    }

    public function landType()
    {
        return $this->belongsTo(LandType::class, 'land_type_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

      public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}