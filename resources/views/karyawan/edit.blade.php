@extends('layouts.layout')
@section('content')
<div class="mx-10">

    <div  class=" mt-5">
        <h2 class="text-xl font-semibold mb-2 text-green-600">Ubah Karyawan</h2>
    <form action="{{ route('karyawan.update',['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    
        <div class="mb-4">
            <label for="nama" class="block text-white font-bold mb-2">Nama:</label>
            <input type="text" name="nama" id="nama" class="border rounded w-full py-2 px-3 bg-gray-700" value="{{$data->nama}}" required>
        </div>
    
        <div class="mb-4">
            <label for="foto" class="block text-white font-bold mb-2">Foto:</label>
            <input type="file" name="foto" id="foto" class="border rounded w-full py-2 px-3 bg-gray-700" accept="image/*" value="{{$data->foto}}" >
        </div>
    
        <div class="mb-4">
            <label for="alamat" class="block text-white font-bold mb-2">Alamat:</label>
            <textarea name="alamat" id="alamat" rows="2" class="border rounded w-full py-2 px-3 bg-gray-700" required>{{$data->alamat}}</textarea>
        </div>
    
        <div class="mb-4">
            <label for="no_hp" class="block text-white font-bold mb-2">Nomor HP:</label>
            <input type="number" name="no_hp" id="no_hp" class="border rounded w-full py-2 px-3 bg-gray-700" value="{{$data->telepon}}" required>
        </div>
    
        <div class="mb-4">
            <label for="jabatan" class="block text-white font-bold mb-2">Jabatan:</label>
            <input type="text" name="jabatan" id="jabatan" class="border rounded w-full py-2 px-3 bg-gray-700" value="{{$data->jabatan}}" required>
        </div>
    
        <div class="mt-4">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ubah</button>
        </div>
    </form>
    </div>
</div>
@endsection