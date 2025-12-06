<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('Admin.Member.index', [
            'members' => Member::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Auth::guard('member')->check()) {
            return redirect('/');
        }

        if (Auth::guard('admin')->check() || Auth::guard('owner')->check()) {
            return redirect('/dashboard');
        }

        return view('Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nama_lengkap' => 'required|max:200',
        //     'alamat' => 'required|max:200',
        //     'no_wa' => 'required|max:20|unique:members',
        //     'email' => 'required|max:100|email:dns|unique:admin|unique:members',
        //     'password' => 'required|max:20'
        // ]);

        // Member::create($validated);

        // return redirect('/login')->with('success', 'Berhasil registrasi dengan email ' . $validated['email'] . ', silahkan login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('Admin.Member.edit', [
            'member' => $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {

        $rules = [
            'nama_lengkap' => 'required|max:200',
            'alamat' => 'required|max:200',
            'foto' => 'max:2000',
        ];

        if ($request->password) {
            $rules['password'] = 'max:20';
        }

        if ($member->email != $request->email) {
            $rules['email'] = 'required|max:100|email:dns|unique:admin|unique:members|unique:owners';
        }

        if ($member->no_wa != $request->no_wa) {
            $rules['no_wa'] = 'required|max:20|unique:members';
        }

        $validated = $request->validate($rules);

        if ($request->password) {
            $validated['password'] = bcrypt($request->password);
        }

        $foto = $request->file('foto');

        if ($foto) {
            $rename = uniqid().'_'.$foto->getClientOriginalName();
            $validated['foto'] = $rename;
            $locationFile = 'File';
            $foto->move($locationFile, $rename);

            File::delete($locationFile.'/'.$member->foto);
        }

        $member->update($validated);

        return redirect('/member')->with('success', 'Data member berhasil di update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }

    public function profile()
    {

        $data = Auth::guard('member')->user();

        return view('Member.profile', ['member' => $data]);
    }
}
