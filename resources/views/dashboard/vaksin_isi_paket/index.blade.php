@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                   
                </div>

                <div class="card-header pb-0 d-flex align-items-center justify-content-between">  
                    <a class="btn btn-primary btn-lg" href="{{ url('vaksin/create') }}">Tambah Paket Vaksin</a>        
                    <h3>D&nbsp;a&nbsp;f&nbsp;t&nbsp;a&nbsp;r&nbsp;&nbsp; P&nbsp;a&nbsp;k&nbsp;e&nbsp;t&nbsp;&nbsp; V&nbsp;a&nbsp;k&nbsp;s&nbsp;i&nbsp;n</h3>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Paket</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Tindakan</th> 
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tarif</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biaya</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jasa</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">JP.Pelaksana</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jp.Asisten</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($vaksin->count() > 0)
                                    @php
                                        $currentJenis = null;
                                        $no = 1; // Inisialisasi nomor
                                    @endphp

                                    @foreach ($vaksin as $item)
                                        @if ($currentJenis !== $item->vaksin->nama_jenis_paket_vaksin)
                                            @if ($currentJenis !== null) 
                                                {{-- Menghapus bagian ini untuk menghilangkan "End of" --}}
                                            @endif
                                            <tr>
                                                <td colspan="10" class="text-uppercase text-primary"><strong>{{ $item->vaksin->nama_jenis_paket_vaksin }}</strong></td>
                                            </tr>
                                            @php 
                                                $currentJenis = $item->vaksin->nama_jenis_paket_vaksin; 
                                                $no = 1; // Reset nomor ke 1 untuk grup baru
                                            @endphp
                                        @endif
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->vaksin->nama_jenis_paket_vaksin ?? 'N/A' }}</td>
                                            <td>{{ $item->nama_tindakan }}</td>
                                            <td>{{ $item->tarif }}</td>
                                            <td>{{ $item->biaya }}</td>
                                            <td>{{ $item->jasa }}</td>
                                            <td>{{ $item->jp_pelaksana }}</td>
                                            <td>{{ $item->jp_asisten }}</td>
                                            <td>{{ $item->status_vaksin }}</td>
                                            <td>
                                                <a class="btn btn-warning btn-lg" href="{{ route('vaksin.edit', $item->id) }}">Edit</a>
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
