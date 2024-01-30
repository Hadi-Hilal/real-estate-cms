<?php

namespace Modules\Page\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $appends = ['image_link'];
    public $translatable = ['title', 'description', 'content', 'keywords'];
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'type', 'publish', 'keywords', 'featured'];

    public function getImageLinkAttribute()
    {
        if ($this->attributes['image']) {
            $path = asset('storage/' . $this->attributes['image']);
        } else {
            $path = asset('images/blank.png');
        }
        return $path;
    }
}
