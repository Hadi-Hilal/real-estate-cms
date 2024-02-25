<?php

namespace Modules\Land\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Translatable\HasTranslations;

class LandType extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['name'];

    public function lands()
    {
        return $this->belongsTo(Land::class)->withDefault();
    }
}
