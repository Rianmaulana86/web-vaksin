@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Pendaftaran Vaksinasi</h6>
                    <br>
                    <a class="btn btn-primary btn-sm" href="{{ url('vaksin_registrasis/create') }}">Tambah Pendaftaran Vaksinasi</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.Registrasi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Registrasi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.RM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.Passport</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Vaksin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Keberangkatan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tindakan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Apotek</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pembayaran Kasir</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Buku ICV Diterima</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($vaksin_registrasis->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($vaksin_registrasis as $vaksin)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $vaksin->no_reg }}</td>
                                            <td>{{ $vaksin->tanggal }}</td>
                                            <td>{{ $vaksin->pasien->nama_pasien }}</td>
                                            <td>{{ $vaksin->pasien->no_rm }}</td>
                                            <td>{{ $vaksin->pasien->no_passport }}</td>
                                            <td>{{ $vaksin->jenis_vaksinasi }}</td>
                                            <td>{{ $vaksin->tanggal_berangkat }}</td>
                                            <td>{{ $vaksin->tindakan_suntik }}</td>
                                            <td>{{ $vaksin->pembayaran_kasir }}</td>
                                            <td>{{ $vaksin->buku_icv }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('vaksin.edit', $vaksin->id) }}">Edit</a>
                                                <form action="{{ route('vaksin_registrasis.destroy', $vaksin->id) }}" method="POST" style="display:inline;">
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
