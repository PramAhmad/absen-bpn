<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // desc id
        $data['data'] = Karyawan::all()->sortByDesc('id');
        return view('karyawan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $karyawan = new Karyawan();
        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->telepon = $request->no_hp;
        $karyawan->jabatan = $request->jabatan;
    
        // Handle image upload and storage
        if ($request->hasFile('foto')) {
      
            $imagePath = $request->file('foto')->store('public/images');
            $imagePath = str_replace('public/', 'storage/', $imagePath);
            $karyawan->foto = $imagePath;
        } else {
           
            $karyawan->foto = null;
        }
    
        
        $karyawan->save();
    
        return redirect()->route('karyawan.index')->with('success', 'Data berhasil ditambahkan');
    }
    

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['data'] = Karyawan::findOrFail($id);
        return view('karyawan.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $data['data'] = Karyawan::findOrFail($id);
      return view('karyawan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->telepon = $request->no_hp;
        $karyawan->jabatan = $request->jabatan;
    
        // Handle image upload and storage
        if ($request->hasFile('foto')) {
      
            $imagePath = $request->file('foto')->store('public/images');
            $imagePath = str_replace('public/', 'storage/', $imagePath);
            $karyawan->foto = $imagePath;
        } 
    
        
        $karyawan->save();
    
        return redirect()->route('karyawan.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Karyawan::findOrFail($id);
        $data->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data berhasil dihapus');
    }
}
