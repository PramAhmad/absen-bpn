@extends('layouts.layout')
@section('content')
<div class="px-5 pt-10">
    <h2 class="text-xl font-semibold mb-4">Detail Karyawan</h2>

    {{-- Flex container for side-by-side layout --}}
    <div class="flex w-full">
        {{-- Left column for employee profile --}}
        <div class="w-full p-4">
            @if ($data->foto)
                {{-- Center the image --}}
                <div class="flex ">
                    <img src="{{ asset($data->foto) }}" alt="Foto {{ $data->nama }}" width="300px">
                </div>
            @else
                <p>No Photo Available</p>
            @endif

            <p><strong>Nama:</strong> {{ $data->nama }}</p>
            <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
            <p><strong>No HP:</strong> {{ $data->telepon }}</p>
            <p><strong>Jabatan:</strong> {{ $data->jabatan }}</p>
        </div>

        {{-- Right column for absen table --}}
        <div class="w-full p-4">
            <h3 class="text-lg font-semibold mb-2">Data Absen</h3>
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th class="py-3 font-semibold text-center text-white">Keterangan</th>
                        <th class="py-3 font-semibold text-center text-white">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->absen as $absen)
                        <tr>
                            <td class="text-center">
                                @if ($absen->status == 0)
                                    <span class="text-primary">Masuk</span>
                                @elseif ($absen->status == 1)
                                    <span class="text-secondary">Sakit</span>
                                @elseif ($absen->status == 2)
                                    <span class="text-warning">Izin</span>
                                @elseif ($absen->status == 3)
                                    <span class="text-danger">Alpa</span>
                                @endif

                            </td>
                            <td class="text-center">{{ $absen->tanggal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
