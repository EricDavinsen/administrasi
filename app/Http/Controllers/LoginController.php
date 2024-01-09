<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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
                'success' => 'Login Success',
                'user' => $user
            ]);
        }

        return redirect()->intended('/')->with('error', 'Email/Password Salah');


    }
    public function store(RegisterRequest $request)
    {
        $pegawai = Pegawai::create($request->validated());

        if ($pegawai) {
            Auth::login($pegawai);
            return redirect()->route('home')->with('success', 'Berhasil Melakukan Registrasi');
        }
        return redirect()->back()->with('error', 'Failed Create Account');
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have successfully logged out');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
