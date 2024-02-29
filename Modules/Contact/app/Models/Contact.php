<?php

namespace Modules\Contact\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'name', 'phone_code', 'phone_number', 'email', 'subject'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->ip = request()->ip();
        });
    }

}
