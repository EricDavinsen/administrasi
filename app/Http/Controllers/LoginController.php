<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
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
        'pegawais' => null,
    ]);
    }

    public function login(Request $request) : RedirectResponse
    {
        $this->validate($request, [
            'EMAIL_PEGAWAI' => ['required', 'email:rfc,dns'],
            'password' => ['required'],
        ]);
        $credential = $request->only('EMAIL_PEGAWAI', 'password');

        if (Auth::guard('pegawais')->attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::guard('pegawais')->user();

            return redirect()->intended('/dashboardpage')->with([
                notify()->success('Login Success'),
                'success' => 'Login Success',
                'user' => $user
            ]);
        }else{
            return redirect()->intended('/')->with([
                'error', 'Failed to Login',
            ]);
        }

    }
    public function register(RegisterRequest $request)
    {
        $pegawais = Pegawai::create($request->validated());

        if ($pegawais) {
            Auth::login($pegawais);
            
            return redirect()->intended('/home')->with('success', 'Register Successfully!');
        }
        return redirect()->back()->with('error', 'Failed Create Account');
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
                'EMAIL_PEGAWAI' => ['required'],
                'password' => ['required'],
                'repassword' => ['required'],
            ],[
                'EMAIL_PEGAWAI.required' => 'Email field is required / Email not found!',
                'password.required' => 'The password field is required',
                'repassword.required' => 'The re-password field is required'
            ]);
    
            $pegawais = Pegawai::where('EMAIL_PEGAWAI', $request->EMAIL_PEGAWAI)->first();
    
            if($validate->fails()) {
                return redirect()->back()->withErrors($validate)->with([
                    'pegawais' => $pegawais
                ]);
            }

            if($pegawais) {
                if($request->password == $request->repassword){
                    $pegawais->password = $request->password;
                    $pegawais->update();
                    return redirect()->intended('/home')->with('success', 'Change Password Successfully!');
                }else {
                    return redirect()->intended('/forgotpassword')->with([
                        'error' => 'Password doesnt match',
                        'pegawais' => $pegawais
                    ]);
                }
            }else {
                return redirect()->intended('/forgotpassword')->with([
                    'error' => 'Email not found',
                    'pegawais' => null
                ]);
            }
        } 
}

