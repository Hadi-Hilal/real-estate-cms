<?php

namespace Modules\Property\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\app\Models\City;
use Modules\Core\app\Models\Country;
use Modules\Core\app\Models\State;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Spatie\Translatable\HasTranslations;

class Property extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'keywords', 'content'];
    protected $fillable = ['title', 'slug', 'description', 'keywords', 'content', 'image', 'slides', 'property_type_id', 'price', 'code', 'country_id', 'state_id', 'city_id', 'created_by', 'category', 'publish', 'citizenship', 'featured', 'visits',];
    protected $appends = ['image_link', 'location', 'price_currency'];
    protected $with = ['features', 'propertyType'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            $property->created_by = Auth::id();
        });
    }

    public function scopePublished($q)
    {
        $q->where('publish', 'published');
    }

    public function scopeType($q, string $type)
    {
        $q->where('category', $type);
    }

    public function scopeCountry($q, string $country)
    {
        if ($country == 'turkey') {
            $q->where('country_id', '223');
        } else {
            $q->where('country_id', '!=', '223');
        }
    }

    public function scopeFeatured($q)
    {
        $q->where('publish', 'published')->where('featured', 1);
    }

    public function scopeCardData($q)
    {
        $q->select('id', 'slug', 'title', 'description', 'image', 'property_type_id', 'category', 'price', 'country_id', 'state_id', 'city_id', 'publish', 'featured');
    }

    public function scopeFilter($q, Request $request)
    {
        if ($request->has('title')) {
            $q->where(function ($query) use ($request) {
                $query->where('title', 'LIKE', "%{$request->query('title')}%")->orWhere('code', 'LIKE', "%{$request->query('title')}%")->orWhere('description', 'LIKE', "%{$request->query('title')}%")->orWhere('keywords', 'LIKE', "%{$request->query('title')}%")->orWhere('content', 'LIKE', "%{$request->query('title')}%");
            });
        }

        if ($request->has('type')) {
            $q->where('property_type_id', $request->query('type'));
        }

        if ($request->has('min_price')) {
            $minPrice = (float)$request->query('min_price');
            $q->where('price', '>', $minPrice);
        }

        if ($request->has('max_price')) {
            $maxPrice = (float)$request->query('max_price');
            $q->where('price', '<', $maxPrice);
        }
        return $q;
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

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getPriceCurrencyAttribute()
    {

        $currencyVal = session()->get('currencyVal');
        if (is_null($currencyVal)) {
            return number_format($this->price) . ' USD';
        }

        return number_format(round($this->price / $currencyVal)) . ' ' . session()->get('currencyCode');
    }

    public function getLocationAttribute()
    {
        return $this->city->name . ',' . $this->state->name;
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
        return $this->belongsToMany(PropertyFeature::class, 'property_feature_pivot');
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
