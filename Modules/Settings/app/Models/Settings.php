<?php

namespace Modules\Settings\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    static public $settings = null;
    public $timestamps = false;
    protected $fillable = [
        'key',
        'value'
    ];

    static function get(string $key, $default = null)
    {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        $model = self::$settings
            ->where('key', $key)
            ->first();
        if (empty($model)) {
            if (empty($default)) {
                return false;
            } else {
                return $default;
            }
        } else {
            return $model->value;
        }
    }

    static function set(string $key, $value)
    {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        if ($value) {
            $model = self::$settings
                ->where('key', $key)
                ->first();

            if (empty($model)) {
                $model = self::create([
                    'key' => $key,
                    'value' => $value
                ]);
                self::$settings->push($model);
            } else {
                $model->update(compact('value'));
            }
            return true;
        }
        return false;

    }

}
