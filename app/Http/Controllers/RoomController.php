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
            'gambar_sampul' => 'required|max:2000',
            'deskripsi' => 'max:1000',
        ]);

        $gambar = $request->file('gambar_sampul');

        $rename = uniqid().'_'.$gambar->getClientOriginalName();

        $validated['gambar_sampul'] = $rename;

        $locationFile = 'File';

        Room::create($validated);

        $gambar->move($locationFile, $rename);

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
            'gambar_sampul' => 'max:2000',
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

        $room->update($validated);

        return redirect('/room')->with('success', 'Berhasil mengedit data kamar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        File::delete('File/'.$room->gambar_sampul);
        $room->delete();

        return redirect('/room')->with('success', 'Berhasil menghapus data kamar');
    }

    public function viewA()
    {
        return view('Member.view-a', [
            'rooms' => Room::all(),
        ]);
    }
}
