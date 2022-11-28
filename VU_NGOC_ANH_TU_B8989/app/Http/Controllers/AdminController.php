<?php

namespace App\Http\Controllers;

use App\Models\Applist;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profiles;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

Gate::define('admin-access', function (User $user) {
    // $user = User::find(1);
    return $user->meta_value == 'Administrator'
        ? Response::allow()
        : Response::deny('You must be an administrator.');
        // $response = Gate::inspect('admin-access');
        // if ($response->allowed()) {
        //     // The action is authorized...
        //     return view('admin');
        // } else {
        //     echo $response->message();
        // }
});
class AdminController extends Controller
{
    //

    public function auth()
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        else {
            $_Auth = Auth::user();
            return view('admin.index',compact('_Auth'));
        }
    }
}
