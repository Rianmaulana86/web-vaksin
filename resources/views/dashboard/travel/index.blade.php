@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Travel</h6>
                    <br>
                    <a class="btn btn-primary btn-sm" href="{{ url('travel/create') }}">Tambah Data Travel</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Travel</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat Travel</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kontak Travel</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Website Travel</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Travel</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Berangkat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Negara Tujuan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($travel->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($travel as $travel)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $travel->nama_travel }}</td>
                                            <td>{{ $travel->alamat_travel }}</td>
                                            <td>{{ $travel->kontak_travel }}</td>
                                            <td>{{ $travel->website_travel }}</td>
                                            <td>{{ $travel->jenis_travel }}</td>
                                            <td>{{ $travel->tgl_berangkat ? $travel->tgl_berangkat->format('d-m-Y') : 'N/A' }}</td>
                                            <td>{{ $travel->negara_tujuan }}</td>
                                            <td>{{ ucfirst($travel->status) }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('travel.edit', $travel->id) }}">Edit</a>
                                                <form action="{{ route('travel.destroy', $travel->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada data travel.</td>
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