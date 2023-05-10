<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    protected $role;

    public function dashboard()
    {

        $this->role = Auth::user()->role;

        if ($this->role == 'admin')
        {
            return view('Backend.home.home');
        }
        else
        {
            return redirect('/');
        }


    }

}
