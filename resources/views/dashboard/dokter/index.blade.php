@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Tenaga Kesehatan</h6>
                    <br>
                    <a class="btn btn-primary btn-sm" href="{{ url('dokter/create') }}">Tambah Data Tenaga Kesehatan</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Posisi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.SIP</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.HP</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dokter->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($dokter as $dokter)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $dokter->nama_dokter }}</td>
                                            <td>{{ $dokter->posisi }}</td>
                                            <td>{{ $dokter->nomor_izin_praktik }}</td>
                                            <td>{{ $dokter->kontak }}</td>
                                            <td>{{ $dokter->alamat }}</td>
                                            <td>{{ ucfirst($dokter->status) }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('dokter.edit', $dokter->id) }}">Edit</a>
                                                <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
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
