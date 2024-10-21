@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3>Penjualan Vaksin</h3>
                   
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Tanggal Penjualan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. Registrasi Pasien</th> 
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Vaksin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($vaksinpenjualan->count() > 0)
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($vaksinpenjualan as $vaksin)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $vaksin->tgl_penjualan }}</td>
                                            <td>{{ $vaksin->no_reg }}</td>
                                            <td>{{ $vaksin->id_vasin }}</td>
                                            <td>{{ $vaksin->jumlah }}</td>
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
