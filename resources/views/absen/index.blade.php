@extends('layouts.layout')
@section('content')
    <div class="px-5 pt-10">
       
        {{-- table karyawan --}}

        <table class="table table-zebra w-full mt-10">
            <thead class="">
                <tr >
                    <td class="py-3 font-semibold text-center text-white" >no</td>
                    <td class="py-3 font-semibold text-center text-white " >nama</td>
                    <td class="py-3 font-semibold text-center text-white" >tanggal</td>
              
                    <td class="py-3 font-semibold text-center text-white" >status</td>
                    @auth
                    <td class="py-3 font-semibold text-center text-white" >aksi</td>
                    @endauth
                </tr>
            </thead>
            <tbody class="">
                @foreach ($data as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$item->karyawan->nama}}</td>
                    <td class="text-center">{{$item->tanggal}}</td>

                   {{-- status 0= masuk 1= sakit 2 = izin 3 = alpa --}}
                    <td class="text-center">
                        @if ($item->status == 0)
                           <span class="text-primary" >Masuk</span>
                        @elseif($item->status == 1)
                            <span class="text-danger" >Sakit</span>
                        @elseif($item->status == 2)
                            <span class="text-warning" >Izin</span>
                        @elseif($item->status == 3)
                            <span class="text-danger" >Alpa</span>
                        @endif
                    @auth
                    <td class="text-center">
                        <a href="{{ route('absen.edit',['id'=>$item->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ubah</a>
                        <form action="{{ route('absen.destroy',['id'=>$item->id]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                        </form>
                    </td>
                    @endauth
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