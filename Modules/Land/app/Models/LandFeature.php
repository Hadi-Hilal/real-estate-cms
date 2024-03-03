<?php

namespace Modules\Land\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LandFeature extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name'];

    public function lands()
    {
        return $this->belongsToMany(Land::class, 'land_feature_pivot');
    }

}
