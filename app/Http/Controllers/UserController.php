<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\login;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
// use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use App\Http\Helpers\GetRole;
use Illuminate\Support\Facades\Cookie;
use function PHPUnit\Framework\returnSelf;

class UserController extends Controller

{
    public function index(){

        return view('login-users.login-card',[

            "title" => "Authentication | TOOLMAN-APP"

        ]);

    }

    public function AdminLogin(){
        return view('login-users.index',[
            "title" =>  "Authentication | TOOLMAN-APP"
        ]);
    }



    public function authenticate(Request $request)
    {
        $request->validate([
            'card_number' => 'required'
        ]);

        $count = User::where('card_number', $request->card_number)->count();
        if ($count === 0) {
            Alert::toast('data anda tidak terdaftar di dalam databases', 'error');
            return redirect('/');
        }

        $users = User::where('card_number', $request->card_number)->get();
        foreach ($users as $user) {
            $data_user = $user;
        }
        $role = new GetRole();
        $role_name = $role->getRoleUsers($data_user->id);


        if (Auth::attempt(['email' => $data_user->email, 'password' => $request->card_number])) {

            $request->session()->regenerate();
            if ($role_name === 'admin') {
                return redirect()->route('admin');
            }
            if ($role_name === 'users') {
                return redirect()->route('dashboard');
            }
            Alert::toast('Users a','error');
            return redirect('/');
        }

    }
    public function AdminAuth(Request $request){
        if (Auth::attempt(['name' => $request->username , 'password' => $request->password])) {
            $users = User::where('name', $request->username)->get();
            foreach ($users as $user) {
                $id = $user->id;
            }
            $request->session()->regenerate();
            $role = new GetRole();
            $getrole = $role->getRoleUsers($id);
            $role_name =  $getrole;   
            if ($role_name === 'users') {
                // dd('user');
                return  redirect()->route('dashboard');
            }
            if ($role_name === 'admin') {
                return  redirect('/dashboard/admin');
            }
        }
        Alert::toast('data anda tidak terdaftar di dalam databases', 'error');
        return redirect()->route('AdminAuth');
    }
    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

}
