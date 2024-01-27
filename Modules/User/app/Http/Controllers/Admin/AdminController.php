<?php

namespace Modules\User\App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->setActive('users lists');
        $this->setActive('admins');
    }

    public function index()
    {
        $roles = Role::all();
        $admins = User::type('admin')
            ->select(['id', 'email', 'name', 'type', 'last_login', 'created_at'])
            ->when(request()->filled('role'), function ($query) {
                $query->whereHas('roles', function ($q) {
                    $q->where('id', request()->input('role'));
                });
            })->paginate($this->pageSize());

        return view('user::admin.admins', compact('admins', 'roles'));
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

        $user->type = 'user';
        try {
            $user->save();
            if ($user->roles()->exists()) {
                $user->roles()->detach();
            }
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->back();
    }
}
