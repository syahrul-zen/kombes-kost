<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('Admin.Room.index', [
            'rooms' => Room::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|unique:rooms|max:100',
            'tipe' => 'required',
            'harga_per_3_bulan' => 'required|numeric',
            'gambar_sampul' => 'required|image|max:2100',
            'gambar_2' => 'required|image|max:2100',
            'gambar_3' => 'required|image|max:2100',
            'deskripsi' => 'max:1000',
        ]);

        // Handle Gambar Sampul Upload
        $gambar = $request->file('gambar_sampul');

        $rename = uniqid().'_'.$gambar->getClientOriginalName();

        $validated['gambar_sampul'] = $rename;

        // Handle Gambar 2 Upload
        $gambar_2 = $request->file('gambar_2');
        $rename2 = uniqid().'_'.$gambar_2->getClientOriginalName();
        $validated['gambar_2'] = $rename2;

        // Handle Gambar 3 Upload
        $gambar_3 = $request->file('gambar_3');
        $rename3 = uniqid().'_'.$gambar_3->getClientOriginalName();
        $validated['gambar_3'] = $rename3;

        $locationFile = 'File';

        Room::create($validated);

        $gambar->move($locationFile, $rename);
        $gambar_2->move($locationFile, $rename2);
        $gambar_3->move($locationFile, $rename3);

        return redirect('/room')->with('success', 'Berhasil menambahkan data kamar');

    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('Admin.Room.edit', [
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $rules = [
            'tipe' => 'required',
            'harga_per_3_bulan' => 'required|numeric',
            'gambar_sampul' => 'image|max:2100',
            'gambar_2' => 'image|max:2100',
            'gambar_3' => 'image|max:2100',
            'deskripsi' => 'max:1000',
        ];

        if ($request->nama != $room->nama) {
            $rules['nama'] = 'required|unique:rooms|max:100';
        }

        $validated = $request->validate($rules);

        if ($request->file('gambar_sampul')) {
            $gambar = $request->file('gambar_sampul');
            $rename = uniqid().'_'.$gambar->getClientOriginalName();
            $locationFile = 'File';
            $gambar->move($locationFile, $rename);
            $validated['gambar_sampul'] = $rename;

            File::delete('File/'.$room->gambar_sampul);
        }

        if ($request->file('gambar_2')) {
            $gambar = $request->file('gambar_2');
            $rename = uniqid().'_'.$gambar->getClientOriginalName();
            $locationFile = 'File';
            $gambar->move($locationFile, $rename);
            $validated['gambar_2'] = $rename;

            File::delete('File/'.$room->gambar_2);
        }

        if ($request->file('gambar_3')) {
            $gambar = $request->file('gambar_3');
            $rename = uniqid().'_'.$gambar->getClientOriginalName();
            $locationFile = 'File';
            $gambar->move($locationFile, $rename);
            $validated['gambar_3'] = $rename;

            File::delete('File/'.$room->gambar_3);
        }

        $room->update($validated);

        return redirect('/room')->with('success', 'Berhasil mengedit data kamar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        File::delete('File/'.$room->gambar_sampul);
        File::delete('File/'.$room->gambar_2);
        File::delete('File/'.$room->gambar_3);
        $room->delete();

        return redirect('/room')->with('success', 'Berhasil menghapus data kamar');
    }

    public function viewA()
    {
        return view('Member.view-a', [
            'rooms' => Room::where('tipe', 'A')->get(),
        ]);
    }

    public function viewB()
    {
        return view('Member.view-b', [
            'rooms' => Room::where('tipe', 'B')->get(),
        ]);
    }

    public function viewC()
    {
        return view('Member.view-c', [
            'rooms' => Room::where('tipe', 'C')->get(),
        ]);
    }
}
