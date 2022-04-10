<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request){
        if(Gate::forUser(Auth::user())->allows('open-admin-panel')){
            return view('admin.home');
        }
        return abort(403);
    }
}
