@extends('layouts.master')

@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                <a class="btn btn-primary btn-lg" href="{{ url('vaksin_registrasis/create') }}">Pendaftaran Vaksinasi</a>   
                <h3>P&nbsp;R&nbsp;O&nbsp;S&nbsp;E&nbsp;S&nbsp;&nbsp; V&nbsp;A&nbsp;K&nbsp;S&nbsp;I&nbsp;N&nbsp;A&nbsp;S&nbsp;I</h3>    
            </div>
               
                <div class="card-body px-0 pt-0 pb-2">
                <div class="mb-2">
    <form action="{{ url('vaksin_registrasis') }}" method="GET">
        <input type="text" id="searchInput" name="search" class="form-control" placeholder="Cari berdasarkan No. Registrasi, Nama, atau No. RM" value="{{ request('search') }}">
    </form>
</div>

<div class="table-responsive p-0">
    <table class="table align-items-center mb-0" id="vaksinTable">
        <thead>
         
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><center>No</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>No. Registrasi</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>Tgl.Registrasi<b>/</b>Tgl.Berangkat</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>Nama</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>No.RM<b>/</b>No.Passport<b>/</b>Jenis Vaksin</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>Print Dokumen</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>Pembayaran Kasir</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>Tindakan</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>Buku dicetak</center></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><center>Buku ICV Diterima</center></th>
                <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><center>Aksi</center></th> -->
            </tr>
         
        </thead>
        <tbody>
            @if ($vaksin_registrasis->count() > 0)
                @php
                    $no = ($vaksin_registrasis->currentPage() - 1) * $vaksin_registrasis->perPage() + 1;
                @endphp

                @foreach ($vaksin_registrasis as $vaksin)
                    <tr>
                        <td><center>{{ $no++ }}</center></td>
                        <td><center>{{ $vaksin->no_reg }}</center></td>
                        <td><center>  {{ Carbon::parse($vaksin->tanggal)->format('d-M-Y') }}&nbsp;/&nbsp;{{ Carbon::parse($vaksin->tanggal_berangkat)->format('d-M-Y') }}</center></td>
                        <td>{{ $vaksin->pasien->nama_pasien }}</td>
                        <td><center>{{ $vaksin->pasien->no_rm }}&nbsp;/&nbsp;{{ $vaksin->pasien->no_passport }}&nbsp;/&nbsp;{{ $vaksin->jenisVaksin->nama_jenis_paket_vaksin ?? 'Error' }}</center></td>
                        <td><center>
                            <a target="_blank" class="btn btn-primary" href="print/pptest/{{ $vaksin->pasien->id_rm }}" target='_blank'>PP Test</a>
                            <a target="_blank" class="btn btn-primary" href="print/persetujuan/{{ $vaksin->pasien->id_rm }}" target='_blank'>Persetujuan</a>
                            <a target="_blank" class="btn btn-primary" href="print/permohonan/{{ $vaksin->pasien->id_rm }}" target='_blank'>Permohonan</a>
                            <a target="_blank" class="btn btn-primary" href="print/skrining/{{ $vaksin->pasien->id_rm }}" target='_blank'>Skrining</a>
                            <a target="_blank" class="btn btn-primary" href="print/alurproses/{{ $vaksin->pasien->id_rm }}" target='_blank'>Alur Proses</a>
                        </center></td>
                      
                        <!-- <td>
                            @if ($vaksin->tindakan_suntik === 'Selesai' && $vaksin->buku_icv === 'Selesai' && $vaksin->pembayaran_kasir === 'Selesai')
                                <a class="btn btn-success d-flex align-items-center justify-content-center" href="{{ $vaksin->pasien->id_rm }}">
                                    <i class="fa fa-print"></i> 
                                </a>
                            @else
                                {{-- <i class="text-danger">Not Complete</i> --}}
                                <a class="btn btn-success d-flex align-items-center justify-content-center" href="print/passbook/{{ $vaksin->pasien->id_rm }}">
                                    <i class="fa fa-print"></i> 
                                </a>
                            @endif
                        </td> -->
                        <td>
                            <center>
                            <form action="{{ route('kasir.pembayaran', $vaksin->id) }}" method="POST" style="display:inline;" >    
                                @csrf
                             
                                <button target='_blank' class="btn {{ $vaksin->pembayaran_kasir === 'Selesai' ? 'btn-success' : 'btn-danger' }}" 
                                        type="submit" 
                                        {{ $vaksin->pembayaran_kasir === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->pembayaran_kasir }}
                                </button>
                            </form>
                            </center>
                        </td>
                        <td>
                            <center>
                            <form action="{{ url('/vaksin/suntik/' . $vaksin->id) }}" method="POST" style="display:inline;" >    
                                @csrf
                            
                                <button  class="btn {{ $vaksin->tindakan_suntik === 'Belum' ? 'btn-danger' : 'btn-success' }}" 
                                        type="submit" 
                                        {{ $vaksin->tindakan_suntik === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->tindakan_suntik }}
                                </button>
                            </form>
                            </center>
                        </td>
                        <td>
                            <center>
                            <form action="{{ route('buku.cetak', $vaksin->id) }}" method="POST" style="display:inline;" > 
                                @csrf
                            
                                <button target='_blank' class="btn {{ $vaksin->buku_icv === 'Selesai' ? 'btn-success' : 'btn-danger' }}" 
                                        type="submit" 
                                        {{ $vaksin->buku_icv === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->buku_icv }}
                                </button>
                            </form>
                            </center>
                        </td>
                        <td>
                            <center>
                            <form action="{{ route('buku.diterima', $vaksin->id) }}"method="POST" style="display:inline;" > 
                                @csrf
                                <button target='_blank' class="btn {{ $vaksin->buku_icv === 'Selesai' ? 'btn-success' : 'btn-danger' }}" 
                                        type="submit" 
                                        {{ $vaksin->buku_icv === 'Selesai' ? 'disabled' : '' }}>
                                    {{ $vaksin->buku_icv }}
                                </button>
                            </form>
                            </center>
                        </td>
                        <!-- <td>
                            <a class="btn btn-primary" href="{{ route('vaksin.edit', $vaksin->id) }}">Edit</a>
                            <form action="{{ route('vaksin_registrasis.destroy', $vaksin->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td> -->
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="12" class="text-center">Tidak ada data vaksin.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $vaksin_registrasis->links() }}
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#vaksinTable tbody tr');
        
        rows.forEach(row => {
            const cells = row.getElementsByTagName('td');
            const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });

    setInterval(() => {
        location.reload();
    }, 60000);


</script>

@endsection
