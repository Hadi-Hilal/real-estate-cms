<?php

namespace Modules\Settings\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Seo extends Model
{
    use HasFactory;
    use HasTranslations;

    static public $seo = null;
    public $translatable = ['value'];
    public $timestamps = false;
    protected $table = 'seo';
    protected $fillable = [
        'key',
        'value'
    ];

    static function get(string $key, $default = null)
    {
        if (empty(self::$seo)) {
            self::$seo = self::all();
        }
        $model = self::$seo
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
        if (empty(self::$seo)) {
            self::$seo = self::all();
        }
        if (is_string($value) || is_int($value)) {
            $model = self::$seo
                ->where('key', $key)
                ->first();

            if (empty($model)) {
                $model = self::create([
                    'key' => $key,
                    'value' => $value
                ]);
                self::$seo->push($model);
            } else {
                $model->update(compact('value'));
            }
            return true;
        }
        return false;

    }
}
