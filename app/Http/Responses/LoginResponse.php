<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->to( route('dashboard') );
//                        auth()->user()->super_admin || auth()->user()->type == 'admin'  ? route('admin.dashboard') : route('dashboard')

    }

}
