<?php

namespace Modules\Property\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Modules\Core\app\Models\City;
use Modules\Core\app\Models\Country;
use Modules\Core\app\Models\State;
use Spatie\Translatable\HasTranslations;

class Property extends Model
{
    use HasFactory;
    use HasTranslations;

      protected $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
        'content',
        'image',
        'slides',
        'property_type_id',
        'price',
        'space',
        'code',
        'country_id',
        'state_id',
        'city_id',
        'created_by',
        'category',
        'publish',
        'featured',
        'visits',
    ];
    public $translatable = ['title' , 'description' , 'keywords' , 'content'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            $property->created_by = Auth::id();
        });
    }
   public function features()
    {
        return $this->belongsToMany(PropertyFeature::class , 'property_feature_pivot');
    }
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
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

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
