<?php

namespace Modules\Blog\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\app\Models\Country;
use Spatie\Translatable\HasTranslations;

class BlogPost extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'content', 'keywords'];
    protected $appends = ['image_link'];
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'country_id', 'category_id', 'publish', 'keywords', 'featured', 'citizenship', 'visites'];
    protected $with = ['category'];

    public function scopeFeatured($q)
    {
        $q->where('publish', 'published')->where('featured', 1);
    }

    public function scopePublished($q)
    {
        $q->where('publish', 'published');
    }

    public function scopeCardData($q)
    {
        $q->select('id', 'slug', 'title', 'description', 'image', 'visites', 'created_at', 'publish', 'featured');
    }

    public function scopeCountry($q, string $country)
    {
        if ($country == 'turkey') {
            $q->where('country_id', '223');
        } else {
            $q->where('country_id', '!=', '223');
        }
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

    public function category()
    {
        return $this->belongsTo(BlogCategory::class)->withDefault();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
