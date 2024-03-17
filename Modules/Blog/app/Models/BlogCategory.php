<?php

namespace Modules\Blog\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\app\Models\Country;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name', 'slug', 'country_id'];

    public function posts()
    {
        return $this->hasMany(BlogPost::class, 'category_id');
    }

    public function scopeCountryFilter($q, string $country)
    {
        if ($country == 'turkey') {
            $q->where('country_id', '223');
        } else {
            $q->where('country_id', '!=', '223');
        }
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
