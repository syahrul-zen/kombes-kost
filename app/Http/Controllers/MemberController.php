<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
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
