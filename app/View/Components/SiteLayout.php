<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Modules\Currency\app\Models\Currency;
use Modules\Page\app\Models\Page;
use Modules\Settings\app\Models\Seo;
use Modules\Settings\app\Models\Settings;

class SiteLayout extends Component
{
    public $seo;
    public $settings;
    public $currencies;
    public $pages ;

    public function __construct()
    {
        $this->seo = Seo::pluck('value', 'key');

        $this->settings = Cache::rememberForever('settings', fn() => tap(new Settings, function ($settings) {
            $settings->setCollection(Settings::all());
        }));

        $this->pages =  Page::featured()->select('slug' , 'title' , 'publish' , 'featured' ,'type' , 'country_id')->get();
        $this->currencies = Currency::all();

    }

    public function render(): View|Closure|string
    {
        return view('components.site-layout');
    }
}
