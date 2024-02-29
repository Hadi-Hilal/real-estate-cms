<?php

namespace Modules\Testimonial\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'position', 'comment'];
    protected $appends = ['image'];
    protected $fillable = ['name', 'position', 'comment', 'publish', 'link', 'avatar', 'citizenship'];

    public function scopePublished($q)
    {
        $q->where('publish', 'published');
    }

    public function getImageAttribute()
    {
        if ($this->attributes['avatar']) {
            $path = asset('storage/' . $this->attributes['avatar']);
        } else {
            $path = asset('images/blank.png');
        }
        return $path;
    }
}
