@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Pasien</h6>
                    <br>
                    <a class="btn btn-primary btn-sm" href="{{ url('pasien/create') }}">Tambah Data Pasien</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.RM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pasien</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Passport</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tempat Lahir</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Lahir</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">J.Kelamin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pekerjaan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.Telp/WA</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pasiens->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($pasiens as $pasien)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pasien->no_rm }}</td>
                                            <td>{{ $pasien->nama_pasien }}</td>
                                            <td>{{ $pasien->no_passport }}</td>
                                            <td>{{ $pasien->tempat_lahir }}</td>
                                            <td>{{ $pasien->tgl_lahir }}</td>
                                            <td>{{ $pasien->kelamin }}</td>
                                            <td>{{ $pasien->no_passport }}</td>
                                            <td>{{ $pasien->pekerjaan }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('pasien.edit', $pasien->id_rm) }}">Edit</a>
                                                <form action="{{ route('pasien.destroy', $pasien->id_rm) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data pasien.</td>
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
