@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Paket Vaksin</h6>
                    <br>
                    <a class="btn btn-primary btn-sm" href="{{ url('vaksin/create') }}">Tambah Pembelian Vaksin</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">   
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.Faktur</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Pembelian</th> 
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Distributor</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Vaksin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Vaksin</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.Batch</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Beli</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Jual</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Exp.Date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($vaksin->count() > 0)
                                    @php
                                        $currentJenis = null;
                                        $no = 1; // Inisialisasi nomor
                                    @endphp

                                    @foreach ($vaksinpembelian as $item)
                                       
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->no_faktur ?? 'N/A' }}</td>
                                            <td>{{ $item->tgl_pembelian }}</td>
                                            <td>{{ $item->distributor->nama }}</td>
                                            <td>{{ $item->vaksin->nama }}</td>
                                            <td>{{ $item->jumlah_pembelian }}</td>
                                            <td>{{ $item->jumlah_tagihan }}</td>
                                            <td>{{ $item->no_batch }}</td>
                                            <td>{{ $item->harga_beli }}</td>
                                            <td>{{ $item->harga_jual }}</td>
                                            <td>{{ $item->exp_date }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('vaksin.edit', $item->id) }}">Edit</a>
                                                <!-- <form action="{{ route('vaksin.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada data vaksin.</td>
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
