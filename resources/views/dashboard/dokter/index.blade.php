@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                    <a class="btn btn-primary btn-lg" href="{{ url('dokter/create') }}">Tambah Nakes</a>  
                    <h3>Daftar Tenaga Kesehatan</h3>   
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Posisi</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.SIP</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.HP</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dokter->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($dokter as $dokter)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $dokter->nama_dokter }}</td>
                                            <td class="text-center">{{ $dokter->posisi }}</td>
                                            <td class="text-center">{{ $dokter->nomor_izin_praktik }}</td>
                                            <td class="text-center">{{ $dokter->kontak }}</td>
                                            <td class="text-center">{{ $dokter->alamat }}</td>
                                            <td class="text-center">{{ ucfirst($dokter->status) }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-warning btn-lg" href="{{ route('dokter.edit', $dokter->id) }}">Edit</a>
                                                <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-lg" type="submit">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data dokter.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
