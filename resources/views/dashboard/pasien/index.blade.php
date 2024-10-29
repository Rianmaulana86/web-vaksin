@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4"> 
                <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                <a class="btn btn-primary btn-lg" href="{{ url('pasien/create') }}">INPUT PASIEN</a>    
                <h3>P A S I E N      &nbsp;&nbsp;    V A K S I N</h3>
                   
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">No.RM</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Nama Pasien</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">No Passport</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Tempat Lahir</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Tanggal Lahir</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">J.Kelamin</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Pekerjaan</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">No.Telp/WA</th>
                                    <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pasiens->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($pasiens as $pasien)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">{{ $pasien->no_rm }}</td>
                                            <td class="text-center">{{ $pasien->nama_pasien }}</td>
                                            <td class="text-center">{{ $pasien->no_passport }}</td>
                                            <td class="text-center">{{ $pasien->tempat_lahir }}</td>
                                            <td class="text-center">{{ $pasien->tgl_lahir }}</td>
                                            <td class="text-center">{{ $pasien->kelamin }}</td>
                                            <td class="text-center">{{ $pasien->pekerjaan }}</td>
                                            <td class="text-center">{{ $pasien->telp }}</td>
                                            
                                            <td>
                                                <a class="btn btn-warning btn-lg" href="{{ route('pasien.edit', $pasien->id_rm) }}">Edit</a>
                                                <form action="{{ route('pasien.destroy', $pasien->id_rm) }}" method="POST" style="display:inline;">
                                                    <!-- @csrf -->
                                                    <!-- @method('DELETE') -->
                                                    <!-- <button class="btn btn-danger" type="submit">Hapus</button> -->
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
