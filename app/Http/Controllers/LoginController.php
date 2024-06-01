<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Providerss\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index() : View
    {
        return view("homepage");
    }

    public function login(Request $request) : RedirectResponse
    {
        $this->validate($request, [
            'email' => ['required'],
            'password' => ['required'],
        ],
        [
            'email.required' => 'Email/Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]
    );
        $loginField = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credential = [
            $loginField => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::guard('users')->attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::guard('users')->user();

            return redirect()->intended('/dashboardpage')->with([
                emotify('success', 'Successfully Login, Welcome to Dashboard!'),
                'success' => 'Login Success',
                'user' => $user
            ]);
        }else{
            return back()->withErrors([
                'error' => 'Email or password wrong.',
            ])->onlyInput('email','password');
        }

    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home')->with('success', 'Logout Successfully!');
    }
  
}