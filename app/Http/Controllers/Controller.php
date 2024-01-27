<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    const FLASH_SUCCESS = 'The Operation Done Successfully';

    public function setActive($key, $value = true)
    {
        $this->active[$key] = $value;
        view()->share('active', $this->active);
        return $this;
    }

    protected function flushMessage(mixed $condition): void
    {
        if ($condition) {
            session()->flash('success', __('The Opreation Done Successfully'));
        } else {
            if (!session()->has('error')) {
                session()->flash('error', __('An Error Occurred!'));
            }
        }
    }

    public function pageSize(){
        if (Config::get('core.page_size')){
            return Config::get('core.page_size');
        }else{
            return 30;
        }
    }
}
