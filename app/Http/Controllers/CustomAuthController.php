<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hash;
use Session;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function home(){
        if(Auth::check()){
            return view('home');
        }
        return redirect('login')->withSucces('Sign in please.');
    }
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|unique',
            'password' => 'required|min:6',

        ]);
        $data = $request->all();
        $user = $this->create($data);
        $user->createToken(Str::random(80));

        return($this->customLogin($request));

    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request['remember']=='on')) {

            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public static function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
//            'token'=>Str::random(80)
        ]);
    }

    public function main(){
        if(Auth::check()){
            return view('main');
        }
        return redirect("home");
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('home');
    }

    public function userReturner(){
        if(Auth::check()){
            return Auth::user();
        }
        abort(403);
    }

    public function userAccountPage(){
        if(Auth::check()){
            return view('account');
        }
        abort(403);
    }

}
