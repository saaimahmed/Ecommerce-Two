<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserListController extends Controller
{
    protected $user;

    public function listUser()
    {
        return view('Backend.user.listuser',[
            'users' => User::orderBy('last_seen','DESC')->get(),
        ]);
    }
    // role edit
    public function editRoleUser($id)
    {
        return view('Backend.user.edit',[
            'user' => User::find($id),
            ]);
    }
    // role update
    public function updateRoleUser(Request $request ,$id)
    {
        $this->user = User::find($id);
        $this->user->role = $request->role;
        $this->user->save();
        Alert::alert()->success('Edit','Updated User role Successfully');
        return redirect()->route('user-list');
    }
    // User Delete
    public function deleteUser($id)
    {
        $this->user = User::find($id);
        $this->user->delete();
        Alert::alert()->warning('Delete','Updated User role Successfully');
        return redirect()->back();
    }
}
