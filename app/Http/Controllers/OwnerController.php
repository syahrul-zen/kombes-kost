<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Member;
use App\Models\Owner;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard()
    {

        $member = Member::count();
        $tahunSaatIni = Carbon::now()->year;

        // Ambil data room yang dibuat pada tahun ini
        $booking = Booking::whereYear('created_at', $tahunSaatIni)->count();
        $pendapatan = Booking::whereYear('created_at', $tahunSaatIni)->where('status_pembayaran', 'success')->sum('total_harga');
        $bookingPending = Booking::where('status_booking', 'pending')->count();

        return view('Admin.dashboard', [
            'member' => $member,
            'booking' => $booking,
            'pendapatan' => $pendapatan,
            'bookingPending' => $bookingPending,
        ]);
    }

    public function editOwner()
    {
        return view('Admin.editOwner', [
            'owner' => Owner::first(),
        ]);
    }

    public function editAdmin()
    {
        return view('Admin.editAdmin', [
            'admin' => User::first(),
        ]);
    }

    public function updateOwner(Request $request, Owner $owner)
    {

        $rules = [
            'name' => 'required|max:100',
        ];

        if ($request->email != $owner->email) {
            $rules['email'] = 'required|max:100|email:dns|unique:admin|unique:members|unique:owners';
        }

        if ($request->password) {
            $rules['password'] = 'max:20';
        }

        $validated = $request->validate($rules);

        $owner->update($validated);

        return redirect('member')->with('success', 'Berhasil mengedit owner');
    }

    public function updateAdmin(Request $request, User $admin)
    {
        $rules = [
            'name' => 'required|max:100',
        ];

        if ($request->email != $admin->email) {
            $rules['email'] = 'required|max:100|email:dns|unique:admin|unique:members|unique:owners';
        }

        if ($request->no_wa != $admin->no_wa) {
            $rules['no_wa'] = 'required|max:15|unique:admin|unique:members';
        }

        if ($request->password) {
            $rules['password'] = 'max:20';
        }

        $validated = $request->validate($rules);

        $admin->update($validated);

        return redirect('member')->with('success', 'Berhasil mengedit admin');

    }
}
