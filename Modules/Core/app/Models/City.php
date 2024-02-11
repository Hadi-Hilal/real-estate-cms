<?php

namespace Modules\Core\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
