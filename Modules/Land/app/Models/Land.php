<?php

namespace Modules\Land\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\app\Models\City;
use Modules\Core\app\Models\Country;
use Modules\Core\app\Models\District;
use Modules\Core\app\Models\State;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Spatie\Translatable\HasTranslations;

class Land extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'keywords', 'content', 'regulation'];
    protected $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
        'content',
        'image',
        'slides',
        'virtual_tour',
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
    protected $appends = ['image_link', 'location', 'price_currency'];
    protected $with = ['features', 'type'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($land) {
            $land->created_by = Auth::id();
        });
    }

    public function scopePublished($q)
    {
        $q->where('publish', 'published');
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
        $q->select('id', 'slug', 'title', 'description', 'image', 'land_type_id', 'price', 'country_id', 'state_id', 'tapu', 'district_id', 'city_id'
            , 'space', 'publish', 'featured');
    }

    public function scopeFilter($q, Request $request)
    {
        if ($request->has('title')) {
            $q->where(function ($query) use ($request) {
                $query->where('title', 'LIKE', "%{$request->query('title')}%")->orWhere('code', 'LIKE', "%{$request->query('title')}%")->orWhere('description', 'LIKE', "%{$request->query('title')}%")->orWhere('keywords', 'LIKE', "%{$request->query('title')}%")->orWhere('content', 'LIKE', "%{$request->query('title')}%");
            });
        }
        if ($request->has('tapu')) {
            $q->where('tapu', $request->query('tapu'));
        }

        if ($request->has('type')) {
            $q->where('land_type_id', $request->query('type'));
        }

        if ($request->has('min_price')) {
            $minPrice = (float)$request->query('min_price');
            $q->where('price', '>', $minPrice);
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
        return $this->district->name . ',' . $this->city->name . ',' . $this->state->name;
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

    public function type()
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
