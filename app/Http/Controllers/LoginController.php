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

    public function regis() : View
    {
        return view("registerpage");
    }

    public function forgotpassword() : View
    {
    return view('forgotpassword')->with([
        'admin' => null,
    ]);
    }

    public function login(Request $request) : RedirectResponse
    {
        $this->validate($request, [
            'EMAIL_ADMIN' => ['required', 'email:rfc,dns'],
            'password' => ['required'],
        ]);
        $credential = $request->only('EMAIL_ADMIN', 'password');

        if (Auth::guard('admin')->attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::guard('admin')->user();

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
    public function register(RegisterRequest $request)
    {
        $admin = Admin::create($request->validated());

        if ($admin) {
            Auth::login($admin);
            
            return redirect()->intended('/home')->with('success', 'Register Successfully!');
        }
        return redirect('/register')->back()->withErrors([
            'error' => "Username/Email/Password Cant be Empty",
        ])->onlyInput('USERNAME','EMAIL_ADMIN','password');
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home')->with('success', 'Logout Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changepassword(Request $request) : RedirectResponse
     {
            $validate = Validator::make($request->all(),[
                'EMAIL_ADMIN' => ['required'],
                'password' => ['required'],
                'repassword' => ['required'],
            ]);
          
    
            $admin = Admin::where('EMAIL_ADMIN', $request->EMAIL_ADMIN)->first();
    
            if($validate->fails()) {
                return redirect()->back()->withErrors($validate)->with([
                    'admin' => $admin
                ]);
            }

            if($admin) {
                if($request->password == $request->repassword){
                    $admin->password = $request->password;
                    $admin->update();
                    return redirect()->intended('/home')->with('success', 'Change Password Successfully!');
                }else {
                    return redirect()->intended('/forgotpassword')->withErrors([
                        'password' => 'Password doesnt match',
                    ])->onlyInput('password','repassword');
                }
            }else {
                return redirect()->intended('/forgotpassword')->withErrors([
                    'email' => 'Email not found',
                    'admin' => null
                ])->onlyInput('email');
            }
    } 
}