<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

use App\Models\Booking;

class ComplainController extends Controller
{

    public function chatAdmin(Booking $booking) {

        Complain::where('booking_id', $booking->id)->update(['is_read' => '1']);

        return view('Admin.Booking.chat', [
            'booking' => $booking->load('member', 'complains'),
        ]);
    }

    public function chat(Booking  $booking) {

        return view('Member.chat', [
            'booking' => $booking->load('complains'),
            'member' => $booking->member
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'is_admin' => 'required',
            'is_read' => 'required',
            'chat' => 'required|max:245',
            'booking_id' => 'required'
        ]);

        Complain::create($validated);

        return back()->with('success', 'Berhasil mengirim chat');

    }
}
