<?php

namespace Modules\Blog\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BlogPost extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'content', 'keywords'];
    protected $appends = ['image_link'];
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'category_id', 'publish', 'keywords', 'featured', 'citizenship', 'visites'];
    protected $with = ['category'];

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
}
