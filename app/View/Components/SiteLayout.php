<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Modules\Settings\app\Models\Seo;
use Modules\Settings\app\Models\Settings;

class SiteLayout extends Component
{
    public $seo;
    public $settings;

    public function __construct()
    {
        $this->seo = Seo::pluck('value', 'key');

        $this->settings = Cache::rememberForever('settings', function () {
            return Settings::all()->pluck('value', 'key');
        });

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.site-layout');
    }
}
