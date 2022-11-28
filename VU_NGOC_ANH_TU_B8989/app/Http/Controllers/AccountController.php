<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File; 
use App\Models\Profiles;

class AccountController extends Controller
{
    //
    public function login()
    {
       
       $info = request()->only('name','password');
       if (Auth::attempt($info)) {
            return redirect()->route('admin.index');

       } 
       return redirect()->back()->with('no','');
    }
    public function register()
    {
       $user = new User;
       $user->name = request('name');
       $user->email = request('email');
       $user->password = encrypt(request('password'));
       if ($user->save()){
        return redirect()->route('login');
       }
       else {
        return redirect()->back();
       }
      
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
