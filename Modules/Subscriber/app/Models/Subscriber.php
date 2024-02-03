<?php

namespace Modules\Subscriber\app\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\Subscriber\database\factories\SubscriberFactory;

class Subscriber extends Model
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['email'];

    protected static function newFactory()
    {
        return SubscriberFactory::new();
    }

}
