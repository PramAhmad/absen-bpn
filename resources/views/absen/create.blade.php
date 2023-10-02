@extends('layouts.layout')
@section('content')
    {{-- form tambah absen --}}
    <div class="mt-5 mx-10">
        <h2 class="text-xl font-semibold mb-2 text-green-600">Tambah Absen</h2>
        {{-- alert succes --}}
        @if (session('success'))
            <div class="bg-green-500 p-3 rounded-lg text-white text-center mb-3">
                {{ session('success') }}
            </div>
        @endif
    <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="karyawan_id" class="block text-white font-bold mb-2">Nama:</label>
            <select name="karyawan_id" id="karyawan_id" class="border rounded w-full py-2 px-3 bg-gray-700" required>
                <option value="">Pilih Karyawan</option>
                @foreach ($karyawan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
    
      
    
        <div class="mb-4">
            <label for="keterangan" class="block text-white font-bold mb-2">Keterangan:</label>
           <select name="status" id="" class="border rounded w-full py-2 px-3 bg-gray-700">
            <option value="0">masuk</option>
            <option value="1">sakit</option>
            <option value="2">izin</option>
            <option value="3">alpa</option>
            
           </select>
        </div>
    
        <div class="mt-4">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </div>
    </form>

    </div>
@endsection