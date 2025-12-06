<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

        // Middleware manual
        if (Auth::guard('member')->check()) {
            return redirect('/');
        }

        if (Auth::guard('admin')->check() || Auth::guard('owner')->check()) {
            return redirect('/dashboard');
        }

        return view('Auth.login');
    }

    public function register(Request $request)
    {

        // Middleware manual

        if (Auth::guard('member')->check()) {
            return redirect('/');
        }

        if (Auth::guard('admin')->check() || Auth::guard('owner')->check()) {
            return redirect('/dashboard');
        }

        $validated = $request->validate([
            'nama_lengkap' => 'required|max:200',
            'alamat' => 'required|max:200',
            'no_wa' => 'required|max:20|unique:members',
            'email' => 'required|max:100|email:dns|unique:members|unique:owners',
            'password' => 'required|max:20',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('foto');

        $fileName = uniqid().'_'.$file->getClientOriginalName();

        $locationFile = 'File';

        $file->move($locationFile, $fileName);

        $validated['foto'] = $fileName;

        $validated['password'] = bcrypt($validated['password']);

        Member::create($validated);

        return redirect('/login')->with('success', 'Berhasil registrasi dengan email '.$validated['email'].', silahkan login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|max:20',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Berhasil login sebagai admin');
        }

        if (Auth::guard('owner')->attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Berhasil login sebagai owner');
        }

        if (Auth::guard('member')->attempt($credentials)) {
            return redirect('/')->with('success', 'Berhasil login sebagai member');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout()
    {
        // Middleware manual
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('owner')->check()) {
            Auth::guard('owner')->logout();
        } else {
            Auth::guard('member')->logout();
        }

        // lalu redirect ke login :
        return redirect('/');
    }
}
