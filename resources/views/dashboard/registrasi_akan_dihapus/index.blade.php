@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Registrasi</h6>
                    <br>
                    <a class="btn btn-primary btn-sm" href="{{ url('registrasi/create') }}">Tambah Data Registrasi</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Registrasi</th>
                                    <th>Rm Pasien</th>
                                    <th>Dokter</th>
                                    <th>Assisten</th>
                                    <th>Negara Tujuan</th>
                                    <th>Tindakan</th>
                                    <th>Apotek Status</th>
                                    <th>Kasir Status</th>
                                    <th>Buku ICV</th>
                                    <th>PP Test</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($registrasi->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($registrasi as $reg)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $reg->no_reg }}</td>
                                            <td>{{ $reg->rm_pasien }}</td>
                                            <td>{{ $reg->dokter }}</td>
                                            <td>{{ $reg->assisten }}</td>
                                            <td>{{ $reg->negara_tujuan }}</td>
                                            <td>{{ ucfirst($reg->tindakan) }}</td>
                                            <td>{{ ucfirst($reg->apotek_status) }}</td>
                                            <td>{{ ucfirst($reg->kasir_status) }}</td>
                                            <td>{{ ucfirst($reg->buku_icv) }}</td>
                                            <td>{{ ucfirst($reg->pp_test) }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('registrasi.edit', $reg->id) }}">Edit</a>
                                                <form action="{{ route('registrasi.destroy', $reg->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="12" class="text-center">Tidak ada data registrasi.</td>
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
