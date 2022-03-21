<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Exports\UserExport;
use Excel;

class UserController extends Controller
{
    function login(Request $req)
    {
        $user = User::where(['email' => $req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return "the email or password is not correct";
        } else {
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }

    function register(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password); #to encrypt the password  
        $user->save();
        return redirect('/login');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new UserExport, 'userlist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new UserExport, 'userlist.csv');
    }

    public function dash()
    {
        return view('dash');
    }
}
