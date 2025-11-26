<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

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
            'deskripsi' => 'max:1000'
        ]);


        $gambar = $request->file('gambar_sampul');

        $rename = uniqid() . '_' . $gambar->getClientOriginalName();

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
