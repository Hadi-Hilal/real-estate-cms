<?php

namespace Modules\Testimonial\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\app\Models\Country;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'position', 'comment'];
    protected $appends = ['image'];
    protected $fillable = ['name', 'country_id', 'position', 'comment', 'publish', 'link', 'avatar', 'citizenship'];

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

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
