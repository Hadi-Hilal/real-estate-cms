<?php

namespace Modules\User\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function __construct()
    {
        $this->setActive('users lists');
        $this->setActive('users');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::type('user')
            ->select(['id', 'email', 'name', 'type', 'email_verified_at', 'last_login', 'created_at'])
            ->when(request()->filled('fVerified'), function ($query) {
                $query->where('email_verified_at', request('fVerified') == 1 ? '!=' : '=', null);
            })
            ->paginate($this->pageSize());
        return view('user::admin.users', compact('users'));
    }

    public function deleteMulti(Request $request)
    {
        $userIds = $request->input('ids');
        try {
            User::destroy($userIds);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->back();
    }

    public function switch(User $user)
    {
        $user->type = 'admin';
        try {
            $user->save();
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->back();
    }
}
