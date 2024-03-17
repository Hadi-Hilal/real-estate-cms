<?php

namespace Modules\Faq\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\app\Models\Country;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'content'];
    protected $fillable = ['title', 'content', 'link', 'publish', 'citizenship', 'country_id'];

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

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
