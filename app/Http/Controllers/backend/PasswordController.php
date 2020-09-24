<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Hash;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:admin');
    }

    public function changePasswordForm()
    {
        return view('backend.profil.password');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))){
            return back()->with('error', 'Password Anda saat ini tidak sesuai dengan yang Anda berikan');
        }
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return back()->with('error', 'Password baru Anda tidak boleh sama dengan Password Anda saat ini');
        }
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed'
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return back()->with('message', 'Password Anda berhasil diganti');
    }

    public function getProfilFoto()
    {
        return view('backend.profil.foto');
    }
}
