<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data'] = Absen::all()->sortByDesc('id');
        return view('absen.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['karyawan'] = Karyawan::all();
        return view('absen.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    validate
        $request->validate([
            'karyawan_id' => 'required',
            'status' => 'required',
        ]);

        $absen = new Absen();
        $absen->karyawan_id = $request->karyawan_id;
        $absen->tanggal = date('Y-m-d');
        $absen->status = $request->status;
        $absen->save();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['karyawan'] = Karyawan::all();
        $data['absen'] = Absen::findOrFail($id);
        return view('absen.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $absen = Absen::findOrFail($id);
        $absen->karyawan_id = $request->karyawan_id;
        $absen->tanggal = date('Y-m-d');
        $absen->status = $request->status;
        $absen->save();
        return redirect()->route('absen.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Absen::findOrFail($id);
        $data->delete();
        return redirect()->route('absen.index')->with('success', 'Data berhasil dihapus');
    }
}
