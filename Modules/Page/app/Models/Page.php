<?php

namespace Modules\Page\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\app\Models\Country;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'content', 'keywords'];
    protected $appends = ['image_link'];
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'type', 'publish', 'keywords', 'featured', 'visites', 'country_id'];

    public function scopeFeatured($q)
    {
        $q->where('publish', 'published')->where('featured', 1);
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

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
