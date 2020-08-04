<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\User;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        return view('login');
    }

    public function doLogin(LoginRequest $request)
    {
        $username = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $user = User::where([
            'name' => $username,
            'email' => $email,
        ])->first();

        // Checking password
        if (empty($user) || !Hash::check($password, $user->password)) {
            return redirect('login');
        }

        // TODO
        session(['logged' => 'true']);

        return redirect('list');
    }
}
