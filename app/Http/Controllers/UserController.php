<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() : View
    {
        $users = Admin::paginate(5);
        return view("daftaruser")->with([
            'users' => $users,
            'admin' => Auth::guard('admin')->user()
        ]);
    }

    public function indexcreate() : View
    {
        return view("tambah/tambahuser");
    }

    public function store(Request $request)
    {
        $request->validate([
            'USERNAME' => 'required',
            'EMAIL_ADMIN' => 'required',
            'password' => 'required',
        ]);

        $userData = $request->all();
        $users = Admin::create($userData);

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
        $users = Admin::where('id', $id);

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
        $users = Admin::where('id', $id)->first();

        return view("edit/edituser")->with([
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $users = Admin::where('id', $id)->first();

        if ($request->USERNAME) {
            $users->USERNAME = $request->USERNAME;
        }
        if ($request->EMAIL_ADMIN) {
            $users->EMAIL_ADMIN = $request->EMAIL_ADMIN;
        }
        if ($request->password) {
            $users->password = $request->password;
        }
      
        $updateUser = Admin::where('id', $id)
        ->limit(1)
        ->update(
            array(
                'USERNAME' => $users->USERNAME,
                'EMAIL_ADMIN' => $users->EMAIL_ADMIN,
                'password' => $users->password,
            ),
        );

    if ($updateUser) {
        return redirect()->intended('/daftaruser')->with([ notify()->success('User Telah Diupdate'),
            'success' => 'User Telah Diupdate']);
    }
    return redirect()->intended('/edituser')->with([ notify()->error('Batal Mengupdate User'),
        'error' => 'Batal Mengupdate User']);

    }

    public function find(Request $request)
    {
        $users = Admin::where('USERNAME', 'like', '%' . $request->search . '%')
            ->orWhere('EMAIL_ADMIN', 'like', '%' . $request->search . '%')
            ->paginate(5);
        $users->appends(['search' => $request->search]);

        return view("daftaruser")->with([
            'users' => $users
        ]);
    }

}
