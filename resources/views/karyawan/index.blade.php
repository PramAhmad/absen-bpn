@extends('layouts.layout')
@section('content')
    <div class="px-5 pt-10">
        {{-- button add karyawan --}}
        <div class="flex justify-end">
            <button id="showFormBtn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Tambah Karyawan</button>
        </div>
        <div id="addKaryawanForm" class="hidden mt-5">
            <h2 class="text-xl font-semibold mb-2">Tambah Karyawan</h2>
        <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block text-white font-bold mb-2">Nama:</label>
                <input type="text" name="nama" id="nama" class="border rounded w-full py-2 px-3 bg-gray-800" required>
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-white font-bold mb-2">Foto:</label>
                <input type="file" name="foto" id="foto" class="border rounded w-full py-2 px-3 bg-gray-800" accept="image/*" required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-white font-bold mb-2">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="2" class="border rounded w-full py-2 px-3 bg-gray-800" required></textarea>
            </div>

            <div class="mb-4">
                <label for="no_hp" class="block text-white font-bold mb-2">Nomor HP:</label>
                <input type="text" name="no_hp" id="no_hp" class="border rounded w-full py-2 px-3 bg-gray-800" required>
            </div>

            <div class="mb-4">
                <label for="jabatan" class="block text-white font-bold mb-2">Jabatan:</label>
                <input type="text" name="jabatan" id="jabatan" class="border rounded w-full py-2 px-3 bg-gray-800" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
        {{-- table karyawan --}}

        <table class="table table-zebra w-full mt-10">
            <thead class="">
                <tr >
                    <td class="py-3 font-semibold text-center text-white" >no</td>
                    <td class="py-3 font-semibold text-center text-white " >nama</td>
                    <td class="py-3 font-semibold text-center text-white" >foto</td>
                    <td class="py-3 font-semibold text-center text-white" >alamat</td>                
                    <td class="py-3 font-semibold text-center text-white" >no hp</td>
                    <td class="py-3 font-semibold text-center text-white" >jabatan</td>
                    <td class="py-3 font-semibold text-center text-white" >aksi</td>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($data as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center"><a href="{{route('karyawan.show',["id" => $item->id])}}" class="text-blue-500">{{$item->nama}}</a></td>
                    <td class="text-center"><img src="{{ asset($item->foto) }}" alt="Foto Karyawan" width="100px">
                    </td>
                    <td class="text-center">{{$item->alamat}}</td>
                    <td class="text-center">{{$item->telepon    }}</td>
                    <td class="text-center">{{$item->jabatan}}</td>
                    <td class="text-center">
                        <div class="flex items-center justify-center gap-5">

                            <a href="{{route('karyawan.edit', $item->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <form action="{{route('karyawan.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        // Show/hide the add Karyawan form
        const showFormBtn = document.getElementById('showFormBtn');
        const addKaryawanForm = document.getElementById('addKaryawanForm');

        showFormBtn.addEventListener('click', () => {
            addKaryawanForm.classList.toggle('hidden');
        });
    </script>
@endsection