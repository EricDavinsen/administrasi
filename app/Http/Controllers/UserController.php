<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() : View
    {
        $user = User::get();
    
        return view("daftaruser")->with([
            'user' => $user,
            'users' => Auth::guard('users')->user(),
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahuser")->with([
            'users' => Auth::guard('users')->user(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ],[
            'username.required' => 'Username Harus Diisi',
            'username.unique' => 'Username Tidak Boleh Sama',   
            'email.required' => 'Email Harus Diisi',
            'email.unique' => 'Email Tidak Boleh Sama',
            'password.required' => 'Password Harus Diisi',
        ]);

        $users = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => "pegawai",
        ]);

        if ($users) {
            return redirect()
                ->intended("/daftaruser")
                ->with([
                notify()->success('User Telah Ditambahkan'),
                "success" => "User Telah Ditambahkan"]);
        }
        return redirect()
            ->intended("/createuser")
            ->with([
                notify()->error('Gagal Menambah User'),
                "error" => "Gagal Menambah User"]);
    }

    public function destroy($id)
    {
        $users = User::where('id', $id);

            if ($users) {
                $users->delete();
                return redirect()->intended('/daftaruser')
                    ->with([ 
                        notify()->success('User Telah Dihapus'),
                        "success" => "User Telah Dihapus"]);
            }else {
                return redirect()->intended('/daftaruser')
                    ->with([
                        notify()->error('Gagal Menghapus User'),
                        "error" => "Gagal Menghapus User"]);
            }
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->first();

        return view("edit/edituser")->with([
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Username Harus Diisi',
            'username.unique' => 'Username Tidak Boleh Sama',   
            'email.required' => 'Email Harus Diisi',
            'email.unique' => 'Email Tidak Boleh Sama',
            'password.required' => 'Password Harus Diisi',
        ]);
      
        $updateUser = User::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ),
        );

    if ($updateUser) {
        return redirect()->intended('/daftaruser')->with([ notify()->success('User Telah Diupdate'),
            'success' => 'User Telah Diupdate']);
    }
    return redirect()->intended('/edituser')->with([ notify()->error('Batal Mengupdate User'),
        'error' => 'Batal Mengupdate User']);

    }

}
