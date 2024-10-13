@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Vaksin</h6>
                    <br>
                    <a class="btn btn-primary btn-sm" href="{{ url('vaksin/create') }}">Tambah Data Vaksin</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Vaksin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Vaksin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Produsen</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Kadaluarsa</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Manfaat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($vaksin->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($vaksin as $vaksin)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $vaksin->nama_vaksin }}</td>
                                            <td>{{ $vaksin->jenis_vaksin }}</td>
                                            <td>{{ $vaksin->produsen }}</td>
                                            <td>{{ $vaksin->tgl_expired }}</td>
                                            <td>{{ $vaksin->manfaat }}</td>
                                            <td>{{ ucfirst($vaksin->status) }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('vaksin.edit', $vaksin->id) }}">Edit</a>
                                                <form action="{{ route('vaksin.destroy', $vaksin->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data vaksin.</td>
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
