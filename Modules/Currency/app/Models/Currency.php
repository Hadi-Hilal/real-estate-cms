<?php

namespace Modules\Currency\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $appends = ['image_link'];
    protected $fillable = ['image', 'name', 'code', 'exchange_rate'];

    public function getImageLinkAttribute()
    {
        if ($this->attributes['image']) {
            $path = asset('storage/' . $this->attributes['image']);
        } else {
            $path = asset('images/default.jpg');
        }
        return $path;
    }
}
