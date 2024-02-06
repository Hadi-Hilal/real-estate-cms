<?php

namespace Modules\Property\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PropertyFeature extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name'];
}
